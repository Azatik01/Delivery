@extends('layouts.admin')
@section('content')
    <div class="container mt-5">
        <h1 class="text-center pb-3">Добавить кафе</h1>
        <form action="{{ route('admin.cafes.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Название</label>
                <input type="text" class="form-control" name="name" value="{{old('name')}}">
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="last_name">Описание</label>
                <textarea class="form-control" name="description">{{old('description')}}</textarea>
                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-3">
                <div class="custom-file ">
                    <label class="custom-file-label form-control" for="customFile">Фотография</label>
                    <input type="file" class="custom-file-input" id="customFile" name="picture">
                    @error('picture')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group mt-3" >
                <label for="author_id">Категории</label>
                <select name="cafe_id" class="custom-select">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                @error('category_id')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button  type="submit" class="btn btn-primary mt-3">Сохранить</button>
        </form>
        <button  type="submit" class="btn btn-warning mt-3">
            <a href="{{route('admin.cafes.index')}}">Назад</a>
        </button>
    </div>
@endsection
