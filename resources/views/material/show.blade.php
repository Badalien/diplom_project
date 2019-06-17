@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Методические материалы
                    @if (Auth::user() && Auth::user()->role === \App\Models\User::ADMIN_ROLE)
                        <div class="float-right">
                            Добавить
                            <a href="/materials/add?path_id={{ $path_id ?? '' }}" >методический материал</a>
                            /
                            <a href="/materials/folders/add?path_id={{ $path_id ?? '' }}" >каталог</a>
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
                        @if (!Auth::user())
                            Методические материалы доступны только для авторизованных пользователей. Пожалуйста, <a href="/login" >авторизуйтесь</a>, или <a href="/register" >создайте</a> аккаунт.
                        @else
                            <form role="form" action="/materials/?search={{ $search ?? '' }}&path_id={{ $path_id ?? '' }}">
                                <div class="form-group">
                                    <label for="material_name">Наименование (или часть описания)</label>
                                    <input type="text" name="search" class="form-control" value="{{ $search ?? '' }}" id="material_name" placeholder="Введите наименование (или часть описания)">
                                </div>
                                @if(!empty($path_id))
                                    <input type="hidden" name="path_id" class="form-control" value="{{ $path_id }}">
                                @endif
                                <button type="submit" class="btn btn-default">Поиск</button>
                            </form>

                            <hr>

                            @if (!empty($path_name))
                                Текущий каталог: {{ $path_name }}
                                <hr>
                            @endif

                            @if($folders)
                                @foreach($folders as $folder)
                                    <div class="media">
                                        <img src="/img/folder.png" class="mr-3" alt="{{ $folder->name }}" width="40" height="40">
                                        <div class="media-body">
                                            <h5 class="mt-0"><a href="/materials/?search={{ $search ?? '' }}&path_id={{ $folder->id }}" >{{ $folder->name }}</a></h5>
                                            <small><i>({{ $folder->created_at }})</i></small>
                                        </div>
                                    </div>
                                @endforeach
                                <br>
                            @endif
                            @if(count($materials) > 0)
                                <table class="table table-striped">
                                    <tbody>
                                    @foreach($materials as $material)
                                        <tr>
                                            <td class="td-width">
                                                <h3><a href="/materials/{{ $material->id }}" target="_blank">{{ $material->name }}</a></h3>
                                                <small class="hex">{{ $material->description ? $material->description : 'Краткое описание отсутствует' }}</small><br>
                                                <small class="hex">Опубликовано {{ $material->created_at }}</small>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                                материалы отсутствуют
                                <br>
                                <br>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
