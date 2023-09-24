@extends('admin.layouts.layout')
@section('content')
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Фильмы</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('movies.index')}}">Главная</a></li>
                            <li class="breadcrumb-item active">Фильмы</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Фильмы</h3>
                </div>

                <div class="card">
                    <div class="card-body">
                        <a class="btn btn-primary mb-3" href="{{route('movies.create')}}">Добавить Фильм</a>
                        @if(count($movies))
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Название</th>
                                    <th>Описание</th>
                                    <th>Жанр</th>
                                    <th style="width: 120px">Год релиза</th>
                                    <th>Управление</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($movies as $movie)
                                    <tr>
                                        <td>{{$movie->id}}</td>
                                        <td>{{$movie->title}}</td>
                                        <td>{{$movie->description}}</td>
                                        <td>{{$movie->genres->pluck('name')->join(",")}}</td>
                                        <td>{{date('d-m-Y', strtotime($movie->release_date))}}</td>
                                        <td>
                                            <a href="{{route('movies.edit',$movie->id)}}" class="btn btn-primary">
                                                <i class="fas fa-pen-square"></i>
                                            </a>
                                            <form action="{{route('movies.destroy',$movie->id)}}" method="post"
                                                  class="d-inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Подтвердите удаление')">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>Фильмов пока нет...</p>
                        @endif
                    </div>
                    <div class="card-footer clearfix">
                        {{$movies->links()}}
                    </div>
                </div>
            </div>
        </section>
@endsection
