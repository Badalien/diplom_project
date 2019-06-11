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
                                            <td>{{ $schedules['Mo'][($lesson_number + 1)] ?? '' }}</td>
                                            <td>{{ $schedules['Tu'][($lesson_number + 1)] ?? '' }}</td>
                                            <td>{{ $schedules['We'][($lesson_number + 1)] ?? '' }}</td>
                                            <td>{{ $schedules['Th'][($lesson_number + 1)] ?? '' }}</td>
                                            <td>{{ $schedules['Fr'][($lesson_number + 1)] ?? '' }}</td>
                                            <td>{{ $schedules['Sa'][($lesson_number + 1)] ?? '' }}</td>
                                            <td>{{ $schedules['Su'][($lesson_number + 1)] ?? '' }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        <br/>
                        <br/>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
