@extends('layouts.admin')

@section('content')

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
        <li class="breadcrumb-item"><a href="{{ route('p-cods.index') }}">Промо код</a></li>
        <li class="breadcrumb-item"><a href="#">Редактирование</a></li>
        <li class="breadcrumb-item"><a href="{{ route('p-cods.edit',$code_one->id) }}">{{ $code_one->title }}</a></li>
    </ol>
    <div class="row">
        <div class="col-lg-6">
            <form action="{{ route('p-cods.update',$code_one->id) }}" method="post">
                <input type="hidden" name="_method" value="put">
                {{ csrf_field() }}
                <div class="card">
                    <div class="card-header"><i class="fa fa-barcode"></i> Редактирование {{ $code_one->title }}</div>
                    <div class="card-body">
                        <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                            <label>Промо код</label>
                            <input type="text" class="form-control" name="title" placeholder="Промо код" required autofocus value="{{ $code_one->title }}">
                            <small class="form-text text-muted">Разрешено латиница и цифры без пробела</small>
                            @if ($errors->has('title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('limit') ? ' has-danger' : '' }}">
                            <label>Лимит</label>
                            <input type="text" class="form-control" name="limit" placeholder="Лимит" value="{{ $code_one->limit }}">
                            <small class="form-text text-muted">Разрешено только цифры без пробела</small>
                            @if ($errors->has('limit'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('limit') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('sum') ? ' has-danger' : '' }}">
                            <label>Сумма</label>
                            <input type="text" class="form-control" name="sum" placeholder="Сумма" value="{{ $code_one->sum }}">
                            <small class="form-text text-muted">Разрешено только цифры без пробела</small>
                            @if ($errors->has('sum'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('sum') }}</strong>
                                </span>
                            @endif
                        </div>

                        <fieldset class="form-group">
                            <div class="row">
                                <div class="col-3"> Скидка в </div>
                                <div class="col-2">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" {{ $code_one->is_sum == 1 ? 'checked' : '' }} name="sales" value="is_sum"> ТГ
                                        </label>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" {{ $code_one->is_percent == 1 ? 'checked' : '' }} name="sales" value="is_percent"> %
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <div class="form-group">
                            <label>Комментарий</label>
                            <input type="text" class="form-control" name="comment" placeholder="Комментарий" value="{{ $code_one->comment }}">
                        </div>
                    </div>
                    <div class="card-footer small text-muted">
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </div>
            </form>
        </div>

        @include(App\User::UserRoleName(Auth::user()->id).'.promo-code.codes')

    </div>

@endsection