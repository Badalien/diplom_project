@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Методические материалы - добавление нового
                    @if (Auth::user() && Auth::user()->role === \App\Models\User::ADMIN_ROLE)
                        <div class="float-right">
                            <a href="/materials/add" >Добавить</a>
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
                        <form role="form">
                            <div class="form-group">
                                <label for="material_name">Наименование (или часть описания)</label>
                                <input type="text" name="search" class="form-control" id="material_name" placeholder="Введите наименование (или часть описания)">
                            </div>
                            <button type="submit" class="btn btn-default">Поиск</button>
                        </form>

                        <hr>

                        <table class="table table-striped">
                            <tbody>
                            @foreach($materials as $material)
                                <tr>
                                    <td class="td-width">
                                        <h3><a href="materials/{{ $material->id }}" target="_blank">{{ $material->name }}</a></h3>
                                        <small class="hex">{{ $material->description ? $material->description : 'Краткое описание отсутствует' }}</small><br>
                                        <small class="hex">Опубликовано {{ $material->created_at }}</small>
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
