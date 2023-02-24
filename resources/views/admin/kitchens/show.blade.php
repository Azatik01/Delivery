@extends('layouts.admin')
@section('content')
    <div class="container mt-5">
        <div class="card text-center text-bg-dark">
            <div class="card-body">
                <h4 class="card-title">Название: {{$kitchen->name}}</h4>
            </div>
        </div>
        <button  type="submit" class="btn btn-warning mt-3">
            <a href="{{route('admin.kitchens.index')}}">Назад</a>
        </button>
    </div>
@endsection
