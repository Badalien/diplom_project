@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Контакты - редактирование</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="col-md-12">

                        <form role="form" method="POST" action="/contacts/save">
                            <div class="form-group">
                                <label for="address">Адрес</label>
                                <input type="text" name="address" id="address" class="form-control" value="{{ $address }}" required placeholder="Введите адресс">
                            </div>
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="text" name="email" id="email" class="form-control" value="{{ $email }}" required placeholder="Введите E-mail">
                            </div>
                            <div class="form-group">
                                <label for="phone">Контактный телефон</label>
                                <input type="text" name="phone" id="phone" class="form-control" value="{{ $phone }}" required placeholder="Введите телефон">
                            </div>
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-default">Сохранить</button>
                        </form>
                        <br>
                    </div>

                    <br/>
                    <br/>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
