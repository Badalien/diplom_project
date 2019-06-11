@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Портфолио</div>

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
                                        <h2>Жукова Светлана Алексеевна</h2>
                                        <span><strong>Место жительства:</strong> г. Ногинск-9 Московской области</span>
                                        <span><strong>Место работы:</strong> МБОУ СОШ №83 83 имени кавалера ордена Мужества  Е.Е.Табакова Богородского городского округа.</span>
                                        <span><strong>Должность:</strong> Учитель начальных классов</span>
                                        <span><strong>Квалификационная категория:</strong> нет</span>
                                        <span><strong>Дополнительная нагрузка:</strong> классный руководитель</span>
                                        <hr>
                                        <p>Начинающий педагог. Закончила РГПУ им. Герцена как филолог со специализацией в области иностранных языков, но по специальности работать не пришлось. прошла переквалификацию на учителя начальных классов. Надеюсь, это мое призвание. Интересуюсь литературой, историей, музыкой. Люблю сочинять и проводить мероприятия для детей. Основная моя идея состоит в том, в начальной школе должно быть учиться интересно, важно не отбить желание учиться, а заложить фундамент для новых познаний.</p>
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
                                                <h2>Образовательное учреждение "Педагогический университет "Первое сентября"</h2>
                                                <p>
                                                    Обучение по курсу: Формирование читательской грамотности младших школьников.
                                                </p>
                                            </div>
                                            <div class="cbp_tmlabel">
                                                <h2>ООО "Инфоурок"</h2>
                                                <p>
                                                    Обучение по курсу: Новые методы и технологии преподавания в начальной школе по ФГОС".
                                                </p>
                                            </div>
                                            <div class="cbp_tmlabel">
                                                <h2>г. Санкт-Петербург
                                                    Автономная некоммерческая организация высшего профессионального образования "Европейский Университет "Бизнес Треугольник"</h2>
                                                <p>
                                                    Образование по специальности: Педагогическое образование:учитель начальных классов.
                                                    Присвоена квалификация: Учитель начальных классов.
                                                </p>
                                            </div>
                                            <div class="cbp_tmlabel">
                                                <h2>Санкт-Петербург
                                                    Государственное образовательное учреждение высшего профессионального образования "Российский государственный педагогический университет им. А.И. Герцена"</h2>
                                                <p>
                                                    Образование по специальности: Филологическое образование.
                                                    Присвоена квалификация: магистр.
                                                </p>
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
                                            <h2>МБОУ СОШ № 83 83 имени кавалера ордена Мужества  Е.Е.Табакова
                                                Богородского городского округа (Ногинск-9)</h2>
                                            <p>Должность: учитель начальных классов</p>
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
