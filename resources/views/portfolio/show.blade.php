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
                                        <h2>{{ $fio }}</h2>
                                        <span><strong>Место жительства:</strong> {{ $residence }}</span><br>
                                        <span><strong>Место работы:</strong> {{ $workplace }}</span><br>
                                        <span><strong>Должность:</strong> {{ $position }}</span><br>
                                        <span><strong>Квалификационная категория:</strong> {{ $category }}</span><br>
                                        <span><strong>Дополнительная нагрузка:</strong> {{ $load }}</span><br>
                                        <hr>
                                        <p> {{ $about }}</p><br>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="panel panel-profile">
                                <div class="panel-heading overflow-h">
                                    <h2 class="panel-title heading-sm pull-left"><i class="fa fa-graduation-cap"></i> Образование</h2>
                                </div>
                                <div class="panel-body">
                                    <div class="cbp_tmlabel">
                                        {{ $learning  }}
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="panel panel-profile">
                                <div class="panel-heading overflow-h">
                                    <h2 class="panel-title heading-sm pull-left"><i class="fa fa-briefcase"></i> Опыт работы</h2>
                                </div>
                                <div class="panel-body">
                                    <div class="cbp_tmlabel">
                                        {{ $work }}
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
