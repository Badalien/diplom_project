@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Редактирование данных профиля</div>

                    <div class="card-body">

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                        <div class="col-md-12">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form role="form" method="POST" action="/profile/edit">
                                <div class="form-group">
                                    <label for="name">Имя</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required placeholder="Введите имя">
                                </div>
                                <div class="form-group">
                                    <label for="patronymic">Фамилия</label>
                                    <input type="text" name="patronymic" id="patronymic" class="form-control" value="{{ $user->patronymic }}" required placeholder="Введите фамилию">
                                </div>
                                <div class="form-group">
                                    <label for="second_name">Отчество</label>
                                    <input type="text" name="second_name" id="second_name" class="form-control" value="{{ $user->second_name }}" required placeholder="Введите отчество">
                                </div>
                                <div class="form-group">
                                    <label for="address">Адрес</label>
                                    <input type="text" name="address" id="address" class="form-control" value="{{ $user->address }}" placeholder="Введите адрес">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Телефон</label>
                                    <input type="text" name="phone" id="phone" class="form-control" value="{{ $user->phone }}" placeholder="Введите телефон">
                                </div>
                                <div class="form-group">
                                    <label for="date_bf">Дата рождения</label>
                                    <input type="text" name="date_bf" id="date_bf" class="form-control" value="{{ $user->date_bf }}" placeholder="Введите дата рождения">
                                </div>
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-default">Сохранить</button>
                            </form>
                        </div>
                        <br/>
                        <br/>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
