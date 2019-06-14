@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Задания на проверку
                    @if (Auth::user() && Auth::user()->role === \App\Models\User::STUDENT_ROLE)
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
                        <table class="table table-striped">
                            <tbody>
                            @foreach($tasks as $task)
                                <tr>
                                    <td class="td-width">
                                        <h3><a href="/tasks/{{ $task['info']->id }}" target="_blank">Задание №{{ $task['info']->id }}</a> от студента {{ $task['student']->patronymic ?? '' }} {{ $task['student']->name ?? '' }} {{ $task['student']->second_name ?? '' }}</h3>
                                        <small class="hex">{{ $task['info']->description ? $task['info']->description : 'Описание отсутствует' }}</small><br>
                                        <small class="hex">
                                            <b>Оценка: </b>{{ $task['info']->estimate > 0 ? $task['info']->estimate : 'не оценено' }}
                                            @if($task['info']->estimate == 0 && Illuminate\Support\Facades\Auth::user()->role == \App\Models\User::ADMIN_ROLE)
                                                <a href="/tasks/estimate/{{ $task['info']->id }}" >оценить</a>
                                            @endif
                                        </small><br>
                                        @if($task['info']->description_estimate)
                                            <small class="hex">
                                                <b>Комментарий к оценке:</b> {{ $task['info']->description_estimate }}
                                            </small><br>
                                        @endif
                                        <small class="hex">Создано {{ $task['info']->created_at }}</small>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
