<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    protected $fillable = [
        'title','image','content','price','category_id','is_popular','is_hit','is_new','portion_id','ingredient_id','ingredient_id_off','ingredient_id_del','preference_id','position','add_ingredient_id',/*'user_id',*/'size_id'
    ];

    public function category() {
        return $this->hasOne('App\Models\Category', 'id', 'category_id');
    }
}
