@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Задания на проверку - добавление нового
                    @if (Auth::user() && Auth::user()->role === \App\Models\User::ADMIN_ROLE)
                        <div class="float-right">
                            <a href="/tasks/add" >Добавить</a>
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
                        <form role="form" method="POST" action="/tasks/save" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="description">Описание задания</label>
                                <input type="text" name="description" id="description" class="form-control" required placeholder="Введите описание задания">
                            </div>
                            <div class="form-group">
                                <label for="file">Файл</label>
                                <input type="file" name="file" class="form-control">
                            </div>
                            <hr>
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-default">Сохранить</button>
                            <br>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
