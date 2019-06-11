@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Создание новости
                    @if (Auth::user() && Auth::user()->role === \App\Models\User::ADMIN_ROLE)
                    <div class="float-right">
                        <a href="/news/" >Список новостей</a>
                    </div>
                    @endif
                </div>

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

                        <form role="form" method="POST" action="/news/" role="form">
                            <div class="form-group">
                                <label for="subject">Заголовок</label>
                                <input type="text" name="subject" id="subject" class="form-control" required placeholder="Введите заголовок новости">
                            </div>
                            <div class="form-group">
                                <label for="text">Текст новости</label>
                                <input type="text" name="text" id="text" class="form-control" required placeholder="Введите текст новости">
                            </div>
                            <div class="form-group">
                                <label for="date_publish">Дата публикации</label>
                                <input type="text" name="date_publish" id="date_publish" required class="form-control" placeholder="Введите дату публикации в формате yyyy.mm.dd">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="is_active" type="checkbox">Показывать новость
                                </label>
                            </div>
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-default">Создать</button>
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
