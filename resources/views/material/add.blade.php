@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Методические материалы - добавление нового
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <div class="col-md-12">
                        <form role="form" method="POST" action="/materials/save" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name">Наименование метод материала</label>
                                <input type="text" name="name" id="name" class="form-control" required placeholder="Введите название метод материала">
                            </div>
                            <div class="form-group">
                                <label for="description">Описание</label>
                                <input type="text" name="description" id="description" class="form-control" placeholder="Введите описание">
                            </div>
                            <div class="form-group">
                                <label for="file">Группа</label>
                                <select id="group_id" type="text" class="form-control @error('group_id') is-invalid @enderror" name="group_id">
                                    <option value="">показывать всем</option>
                                    @foreach($groups as $group)
                                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="file">Файл</label>
                                <input type="file" name="file" class="form-control">
                            </div>
                            <hr>
                            @if(!empty($path_id))
                                <input type="hidden" name="path_id" class="form-control" value="{{ $path_id }}">
                            @endif
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
