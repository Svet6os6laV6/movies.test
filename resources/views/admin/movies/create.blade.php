@extends('admin.layouts.layout')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Добавить фильм</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('movies.index')}}">Главная</a></li>
                        <li class="breadcrumb-item active">Добавить фильм</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Добавить</h3>
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
                    <form action="{{route('movies.store')}}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Название:</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                       id="title" name="title" placeholder="Название">
                            </div>
                            <div class="form-group">
                                <label for="description">Описание:</label>
                                <textarea id="description"
                                          class="form-control @error('description') is-invalid @enderror"
                                          name="description"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Жанры</label>
                                <select class="select2" multiple="multiple" id="genres" name="genres[]">
                                    @foreach($genres as $k=>$v)
                                        <option value="{{$k}}">{{$v}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="release_date">Дата:</label>
                                <input type="date" class="form-control @error('release_date') is-invalid @enderror"
                                       id="release_date" name="release_date" placeholder="Название">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
