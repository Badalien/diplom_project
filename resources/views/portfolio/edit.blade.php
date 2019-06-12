@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Портфолио
                    @if (Auth::user() && Auth::user()->role === \App\Models\User::ADMIN_ROLE)
                        <div class="float-right">
                            <a href="/portfolio/edit" >Изменить данные</a>
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
                        <div class="profile-body margin-bottom-20">
                            <div class="profile-bio margin-bottom-10">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form role="form" method="POST" action="/portfolio/save">
                                            <div class="form-group">
                                                <label for="portfolio_fio">ФИО</label>
                                                <input type="text" name="portfolio_fio" id="portfolio_fio" class="form-control" value="{{ $fio }}" required placeholder="Введите фио">
                                            </div>
                                            <div class="form-group">
                                                <label for="portfolio_residence">Место жительства</label>
                                                <input type="text" name="portfolio_residence" id="portfolio_residence" class="form-control" value="{{ $residence }}" placeholder="Введите место жительства">
                                            </div>
                                            <div class="form-group">
                                                <label for="portfolio_workplace">Место работы</label>
                                                <input type="text" name="portfolio_workplace" id="portfolio_workplace" class="form-control" value="{{ $workplace }}" placeholder="Введите место работы">
                                            </div>
                                            <div class="form-group">
                                                <label for="portfolio_position">Должность</label>
                                                <input type="text" name="portfolio_position" id="portfolio_position" class="form-control" value="{{ $position }}" placeholder="Введите должность">
                                            </div>
                                            <div class="form-group">
                                                <label for="portfolio_category">Квалификационная категория</label>
                                                <input type="text" name="portfolio_category" id="portfolio_category" class="form-control" value="{{ $category }}" placeholder="Введите квалификационную категорию">
                                            </div>
                                            <div class="form-group">
                                                <label for="portfolio_load">Дополнительная нагрузка</label>
                                                <input type="text" name="portfolio_load" id="portfolio_load" class="form-control" value="{{ $load }}" placeholder="Введите дополнительную нагрузку">
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label for="portfolio_about">О себе</label>
                                                <input type="text" name="portfolio_about" id="portfolio_about" class="form-control" value="{{ $about }}" placeholder="Введите дополнительную информацию">
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label for="portfolio_learning">Образование</label>
                                                <input type="text" name="portfolio_learning" id="portfolio_learning" class="form-control" value="{{ $learning }}" placeholder="Введите информацию об образовании">
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label for="portfolio_work">Опыт работы</label>
                                                <input type="text" name="portfolio_work" id="portfolio_work" class="form-control" value="{{ $work }}" placeholder="Введите информацию об опыте работы">
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

                    <br/>
                    <br/>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
