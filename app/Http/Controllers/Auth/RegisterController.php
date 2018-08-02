<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\User_Role;
use App\Models\Bonus_Log;
use App\Models\Setting;
use App\Models\user_bonus;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/account';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            //'phone' => 'required|phone|unique:users',
            'phone' => 'required|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        /* создание нового пользователя */
        $user = new User;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->phone = $data['phone'];
        $user->password = bcrypt($data['password']);
        if(isset($data['referer_id']) && User::find($data['referer_id']))   $user->referer_id = $data['referer_id'];
        $user->save();
        //Добавим бонусы рефереру за регистрацию по его партнерской ссылке
        $referer_bonus_sum = Setting::all()->find(1)->referer_bonus_sum;
        $user_bonus = user_bonus::where('user_id',$user->referer_id)->get()->first();
        $bonus_exist = isset($user_bonus->bonus)? (int)$user_bonus->bonus : 0;
        $new_sum_bonus = $bonus_exist + $referer_bonus_sum;
        user_bonus::updateOrCreate(['user_id' => $user->referer_id],['bonus' => $new_sum_bonus]);
        //запишем информацию в журнал
        Bonus_Log::create([
            'order_id' => 0,
            'user_id' => $user->referer_id,
            'bonus' => $referer_bonus_sum,
            'notes' => 'Начисление бонусов за регистрацию по партнерской ссылке (пользователь: '.$user->name.' ('.$user->phone.')',
        ]);


        /* присвоение роли "клиент" для нового пользователя */
        $role = new User_Role;
        $role->user_id = $user->id;
        $role->role_id = '3';
        $role->save();

        /* возврашаем пользователя */
        return $user;
    }

}
