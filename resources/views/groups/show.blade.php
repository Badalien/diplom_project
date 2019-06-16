@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Группы
                    @if (Auth::user() && Auth::user()->role === \App\Models\User::ADMIN_ROLE)
                    <div class="float-right">
                        <a href="/groups/add" >Добавить группу</a>
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
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Наименование</th>
                                <th scope="col">Описание</th>
                                <th scope="col">Дата добавления</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($groups as $group)
                                <tr>
                                    <th scope="row">{{ $group->id }}</th>
                                    <td>
                                        {{ $group->name }}
                                        <small>(<a href="/groups/delete/{{ $group->id }}">удалить</a>)</small>
                                    </td>
                                    <td>{{ $group->description }}</td>
                                    <td>{{ $group->created_at }}</td>
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
