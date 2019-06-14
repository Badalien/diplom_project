@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Создание предмета
                    <div class="float-right">
                        <a href="/subjects/" >Список предметов</a>
                    </div>
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

                        <form role="form" method="POST" action="/subjects/save" role="form">
                            <div class="form-group">
                                <label for="name">Наименование предмета</label>
                                <input type="text" name="name" id="name" class="form-control" required placeholder="Введите наименование предмета">
                            </div>
                            <div class="form-group">
                                <label for="description">Описание</label>
                                <input type="text" name="description" id="description" class="form-control" placeholder="Введите описание предмета">
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
