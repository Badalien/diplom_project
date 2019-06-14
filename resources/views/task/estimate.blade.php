@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Задания на проверку - выставление оценки
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <div class="col-md-12">
                        <form role="form" method="POST" action="/tasks/estimate/{{ $task->id }}" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Описание задания</label>
                                {{ $task->description ? $task->description : 'отсутствует' }}
                            </div>
                            <div class="form-group">
                                <label>Студент</label>
                                {{ $student->patronymic ?? '' }} {{ $student->name ?? '' }} {{ $student->second_name ?? '' }}
                            </div>
                            <div class="form-group">
                                <label>Файл</label>
                                <a href="/tasks/{{ $task->id }}" target="_blank">скачать</a>
                            </div>
                            <div class="form-group">
                                <label for="estimate">Итоговая оценка</label>
                                <input type="number" step="0.01" max="99.99" name="estimate" id="estimate" class="form-control" required placeholder="Введите оценку">
                            </div>
                            <div class="form-group">
                                <label for="description_estimate">Комментарий к оценке</label>
                                <input type="input" name="description_estimate" id="description_estimate" class="form-control" placeholder="Введите комментарий к оценке">
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
