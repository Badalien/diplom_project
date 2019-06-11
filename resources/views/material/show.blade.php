@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Методические материалы</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <div class="col-md-12">
                        <form role="form">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Наименование (или часть описания)</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Год добавления файла</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-default">Поиск</button>
                        </form>

                        <hr>

                        <table class="table table-striped">
                            <tbody>
                            <tr>
                                <td class="td-width">
                                    <h3><a href="?action=download&amp;fid=1673874" target="_blank">Предметная неделя в группе Мастер отделочных строительных работ</a></h3>
                                    <small class="hex">Краткое описание отсутствует</small><br>
                                    <small class="hex">Опубликовано 05.06.2019</small>
                                </td>
                            </tr>
                            <tr>
                                <td class="td-width">
                                    <h3><a href="?action=download&amp;fid=1673874" target="_blank">Предметная неделя в группе Мастер отделочных строительных работ</a></h3>
                                    <small class="hex">Сделано для того и для этого. Для всего в общем</small><br>
                                    <small class="hex">Опубликовано 05.06.2019</small>
                                </td>
                            </tr>
                            <tr>
                                <td class="td-width">
                                    <h3><a href="?action=download&amp;fid=1673874" target="_blank">Предметная неделя в группе Мастер отделочных строительных работ</a></h3>
                                    <small class="hex">Краткое описание отсутствует</small><br>
                                    <small class="hex">Опубликовано 05.06.2019</small>
                                </td>
                            </tr>
                            <tr>
                                <td class="td-width">
                                    <h3><a href="?action=download&amp;fid=1673874" target="_blank">Предметная неделя в группе Мастер отделочных строительных работ</a></h3>
                                    <small class="hex">Сделано для того и для этого. Для всего в общем</small><br>
                                    <small class="hex">Опубликовано 05.06.2019</small>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
