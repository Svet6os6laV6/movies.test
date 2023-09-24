@extends('admin.layouts.layout')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Редактировать фильм</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('movies.index')}}">Главная</a></li>
                        <li class="breadcrumb-item active">Редактировать фильм</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Фильм "{{$movie->title}}"</h3>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{route('movies.update',$movie->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Изменить название:</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                       id="title" name="title" value="{{$movie->title}}">
                            </div>
                            <div class="form-group">
                                <label for="description">Изменить описание:</label>
                                <textarea id="description"
                                          class="form-control @error('description') is-invalid @enderror"
                                          name="description" >{{$movie->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Изменить жанры</label>
                                <select class="select2" multiple="multiple" id="genres" name="genres[]">
                                    @foreach($genres as $k=>$v)
                                        <option value="{{$k}}" @if(in_array($k, $movie->genres()->pluck('id')->all())) selected @endif>{{$v}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="release_date">Изменить Дату:</label>
                                <input type="date" class="form-control @error('release_date') is-invalid @enderror"
                                       id="release_date" name="release_date" value="{{$movie->release_date}}">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>
                    </form>
                </div>
            </div>


        </div>
        <!-- /.card -->

    </section>
@endsection
