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
                            @foreach($news as $new)
                                <tr>
                                    <td valign="top" class="news-date">
                                        <div class="dateonimg">
                                            <span class="pdate">{{ Carbon\Carbon::createFromDate($new['info']->date_publish)->format('d') }}</span>
                                            <span class="pmonth">
                                                {{ Carbon\Carbon::createFromDate($new['info']->date_publish)->format('M') }}/{{ Carbon\Carbon::createFromDate($new['info']->date_publish)->format('y') }}
                                            </span>
                                        </div>
                                    </td>
                                    <td valign="top">
                                        <h1 class="entry-title">
                                            <a href="/" rel="bookmark">{{$new['info']->subject}}</a>
                                        </h1>

                                        <div class="entry-meta">
                                        <span class="date">
                                            <b>
                                                <i>
                                                    <small>
                                                        {{ Carbon\Carbon::createFromDate($new['info']->date_create)->format('M') }}
                                                        {{ Carbon\Carbon::createFromDate($new['info']->date_create)->format('d') }},
                                                        {{ Carbon\Carbon::createFromDate($new['info']->date_create)->format('Y') }}
                                                        ({{ $new['user']->patronymic }} {{ $new['user']->name ?? '' }} {{ $new['user']->second_name ?? '' }})
                                                    </small>
                                                </i>
                                            </b>
                                        </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="entry-summary">
                                            <p>{{$new['info']->text}}</p>
                                        </div><!-- .entry-summary -->
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <hr>
                                    </td>
                                </tr>
                            @endforeach
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
