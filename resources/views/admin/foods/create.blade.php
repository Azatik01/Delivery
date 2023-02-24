@extends('layouts.admin')
@section('content')
    <div class="container mt-5">
        <h1 class="text-center pb-3">Добавить блюдо</h1>
        <form action="{{ route('admin.foods.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Название</label>
                <input type="text" class="form-control" name="name" value="{{old('name')}}">
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Цена</label>
                <input type="text" class="form-control" name="price" value="{{old('price')}}">
                @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-3" >
                <label for="author_id">Кафе</label>
                <select name="cafe_id" class="custom-select">
                    @foreach($cafes as $cafe)
                        <option value="{{$cafe->id}}">{{$cafe->name}}</option>
                    @endforeach
                </select>
                @error('cafe_id')
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
                <label for="author_id">Кухни</label>
                <select name="cafe_id" class="custom-select">
                    @foreach($kitchens as $kitchen)
                        <option value="{{$kitchen->id}}">{{$kitchen->name}}</option>
                    @endforeach
                </select>
                @error('kitchen_id')
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
