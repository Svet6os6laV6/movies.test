@extends('admin.layouts.layout')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Жанры</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('movies.index')}}">Главная</a></li>
                        <li class="breadcrumb-item active">Жанры</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Жанры</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <a class="btn btn-primary mb-3" href="{{route('genres.create')}}">Добавить жанр</a>
                    @if($genres->count())
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Название</th>
                                <th>Управление</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($genres as $genre)
                                <tr>
                                    <td>{{$genre->id}}</td>
                                    <td>{{$genre->name}}</td>
                                    <td>
                                        <a href="{{route('genres.edit',$genre->id)}}" class="btn btn-primary">
                                            <i class="fas fa-pen-square"></i>
                                        </a>
                                        <form action="{{route('genres.destroy',$genre->id)}}" method="post"
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
                        <p>Жанров пока нет...</p>
                    @endif
                </div>
                <div class="card-footer clearfix">
                    {{$genres->links()}}
                </div>
            </div>
        </div>
    </section>
@endsection
