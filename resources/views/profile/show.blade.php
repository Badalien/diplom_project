@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Профиль</div>

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

                            <div class="form-group">
                                <label for="subject">Имя: </label> {{ $user->name ?? 'не указано' }}<br>
                                <label for="subject">Фамилия: </label> {{ $user->patronymic ?? 'не указано' }}<br>
                                <label for="subject">Отчество: </label> {{ $user->second_name ?? 'не указано' }}<br>
                                <label for="subject">E-mail: </label> {{ $user->email ?? 'не указано' }}<br>
                                <label for="subject">E-mail подтвержден: </label> {{ $user->email_verified_at ? 'да' : 'нет' }}<br>
                                <label for="subject">Адрес: </label> {{ $user->address ?? 'не указано' }}<br>
                                <label for="subject">Телефон: </label> {{ $user->phone ?? 'не указано' }}<br>
                                <label for="subject">Дата рождения: </label> {{ $user->date_bf ?? 'не указано' }}<br>
                            </div>

                            <a href="/profile/edit" >Редактировать</a>
                            <a href="/profile/password" >Инструкция по смене пароля</a>
                        </div>

                        <br/>
                        <br/>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
