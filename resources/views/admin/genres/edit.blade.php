@extends('admin.layouts.layout')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Редактировать жанр</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('movies.index')}}">Главная</a></li>
                        <li class="breadcrumb-item active">Редактировать жанр</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">

                <h3 class="card-title">Жанр "{{$genre->name}}"</h3>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{route('genres.update',$genre->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="genre">Изменить название</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="genre"
                                       name="name" value="{{$genre->name}}">
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
