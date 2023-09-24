@extends('admin.layouts.layout')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Главная страница</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('movies.index')}}">Главная</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Главная</h3>
            </div>
            <div class="card-body">
                <img class="img-fluid" width="600" src="{{ Vite::image('film.jpeg') }}">
                <h2>Фильмотека</h2>
                <div class="mt-2">Административная панель, в которой вы можете добавить фильм, а так же жанр.</div>
            </div>
        </div>
    </section>
@endsection
