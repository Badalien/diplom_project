@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Новости
                    @if (Auth::user() && Auth::user()->role === \App\Models\User::ADMIN_ROLE)
                    <div class="float-right">
                        <a href="/news/create" >Добавить новость</a>
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
                        <table>
                            <tr>
                                <td valign="top" class="news-date">
                                    <div class="dateonimg">
                                        <span class="pdate">23</span>
                                        <span class="pmonth">Янв/19</span>
                                    </div>
                                </td>
                                <td>
                                    <h1 class="entry-title">
                                        <a href="/" rel="bookmark">Акция «Поздравление пожилых людей отдаленных районов России с Новогодними праздниками»</a>
                                    </h1>

                                    <div class="entry-meta">
                                        <span class="date">
                                            <b><i><small>Январь 23, 2019 (Админов С.А.)</small></i></b>
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div class="entry-summary">
                                        <p>В рамках волонтерской деятельности учащиеся&nbsp;&nbsp;3 «К» класса&nbsp;&nbsp; 5 здания с 20 декабря по 14 января участвовали в акции «Поздравление пожилых людей отдаленных районов России с Новогодними праздниками» &nbsp; &nbsp;</p>
                                    </div><!-- .entry-summary -->
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <hr>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top" class="news-date">
                                    <div class="dateonimg">
                                        <span class="pdate">23</span>
                                        <span class="pmonth">Янв/19</span>
                                    </div>
                                </td>
                                <td>
                                    <h1 class="entry-title">
                                        <a href="/" rel="bookmark">Акция «Поздравление пожилых людей отдаленных районов России с Новогодними праздниками»</a>
                                    </h1>

                                    <div class="entry-meta">
                                        <span class="date">
                                            <b><i><small>Январь 23, 2019 (Админов С.А.)</small></i></b>
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div class="entry-summary">
                                        <p>В рамках волонтерской деятельности учащиеся&nbsp;&nbsp;3 «К» класса&nbsp;&nbsp; 5 здания с 20 декабря по 14 января участвовали в акции «Поздравление пожилых людей отдаленных районов России с Новогодними праздниками» &nbsp; &nbsp;</p>
                                    </div><!-- .entry-summary -->
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <hr>
                                </td>
                            </tr>
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
