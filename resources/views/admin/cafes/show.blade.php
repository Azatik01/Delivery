@extends('layouts.admin')
@section('content')
    <div class="container mt-5">
        <div class="card text-center text-bg-dark">
            <img class="card-img-top" style="width: 300px; height: 300px" src="{{asset('storage/' . $cafe->picture)}}" alt="{{$cafe->picture}}">
            <div class="card-body">
                <h4 class="card-title">Название: {{$cafe->name}}</h4>
                <h4 class="card-title">Описание: {{$cafe->description}}</h4>
            </div>
        </div>
        <button  type="submit" class="btn btn-warning mt-3">
            <a href="{{route('admin.cafes.index')}}">Назад</a>
        </button>
    </div>
@endsection
