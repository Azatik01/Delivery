@extends('layouts.admin')
@section('content')
    <div class="container mt-5">
        <h1 class="text-center pb-3">Добавить кухню</h1>
        <form action="{{route('admin.kitchens.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Название</label>
                <input type="text" class="form-control" name="name" value="{{old('name')}}">
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button  type="submit" class="btn btn-primary mt-3">Сохранить</button>
        </form>
        <button  type="submit" class="btn btn-warning mt-3">
            <a href="{{route('admin.kitchens.index')}}">Назад</a>
        </button>
    </div>
@endsection
