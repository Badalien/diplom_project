@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Студенты
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">ФИО</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">адрес</th>
                                <th scope="col">телефон</th>
                                <th scope="col">группа</th>
                                <th scope="col">дата рождения</th>
                                <th scope="col">Дата регистрации</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $student)
                                <tr>
                                    <th scope="row">{{ $student->id }}</th>
                                    <td>
                                        {{ $student->patronymic }} {{ $student->name }} {{ $student->second_name }}
                                    </td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->address }}</td>
                                    <td>{{ $student->phone }}</td>
                                    <td>
                                        @if($student->group_id)
                                            {{ $groups[$student->group_id] ?? 'не найдена' }}
                                        @endif
                                    </td>
                                    <td>{{ $student->date_bf }}</td>
                                    <td>{{ $student->created_at }}</td>
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
