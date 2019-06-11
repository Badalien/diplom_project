@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Рассписание
                        @if (Auth::user() && Auth::user()->role === \App\Models\User::ADMIN_ROLE)
                            <div class="float-right">
                                <a href="/schedules/edit" >Изменить расписание</a>
                            </div>
                        @endif
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            <div class="table-responsive">
                                <form role="form" method="POST" action="/schedules/save">
                                    <table class="table table_s">
                                        <tbody>
                                        <tr>
                                            <th class="first">№ пары</th>
                                            <th>Понедельник</th>
                                            <th>Вторник</th>
                                            <th>Среда</th>
                                            <th>Четверг</th>
                                            <th>Пятница</th>
                                            <th>Суббота</th>
                                            <th>Воскресенье</th>
                                        </tr>
                                        @foreach($lessons as $lesson_number => $lesson_time)
                                            <tr>
                                                <th class="padding">
                                                    {{ ($lesson_number + 1) }} пара<br>{{ $lesson_time }}
                                                </th>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" name="Mo[{{ ($lesson_number + 1) }}]" class="form-control" value="{{ $schedules['Mo'][($lesson_number + 1)] ?? '' }}" placeholder="{{ $schedules['Mo'][($lesson_number + 1)] ?? '' }}">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" name="Tu[{{ ($lesson_number + 1) }}]" class="form-control" value="{{ $schedules['Tu'][($lesson_number + 1)] ?? '' }}" placeholder="{{ $schedules['Tu'][($lesson_number + 1)] ?? '' }}">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" name="We[{{ ($lesson_number + 1) }}]" class="form-control" value="{{ $schedules['We'][($lesson_number + 1)] ?? '' }}" placeholder="{{ $schedules['We'][($lesson_number + 1)] ?? '' }}">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" name="Th[{{ ($lesson_number + 1) }}]" class="form-control" value="{{ $schedules['Th'][($lesson_number + 1)] ?? '' }}" placeholder="{{ $schedules['Th'][($lesson_number + 1)] ?? '' }}">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" name="Fr[{{ ($lesson_number + 1) }}]" class="form-control" value="{{ $schedules['Fr'][($lesson_number + 1)] ?? '' }}" placeholder="{{ $schedules['Fr'][($lesson_number + 1)] ?? '' }}">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" name="Sa[{{ ($lesson_number + 1) }}]" class="form-control" value="{{ $schedules['Sa'][($lesson_number + 1)] ?? '' }}" placeholder="{{ $schedules['Sa'][($lesson_number + 1)] ?? '' }}">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" name="Su[{{ ($lesson_number + 1) }}]" class="form-control" value="{{ $schedules['Su'][($lesson_number + 1)] ?? '' }}" placeholder="{{ $schedules['Su'][($lesson_number + 1)] ?? '' }}">
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
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
