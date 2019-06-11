@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Инструкция по смене пароля</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Для изменения пароля требуется подтверждение через E-mail адрес, указанный при регистрации.<br>
                    Для этого необходимо выйти из аккаунта, и перейти на страницу восстановления пароля. Далее ввести E-mail адрес.<br>
                    На почту прийдет письмо со ссылкой, при переходе по ссылке будет возможность ввести новый пароль.
                    <br/>
                    <br/>

                    <a href="/profile/" >Назад</a>
                    <br/>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
