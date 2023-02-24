@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="card mb-3">
            <div style="display: inline-block">
                <img class="" style="width: 400px; height: 300px" src="{{asset('storage/' . $cafe->picture)}}"
                     alt="{{$cafe->picture}}">
            </div>
            <div class="card-body" style="display: inline-block">
                <h4 class="card-title" style="display: inline-block">{{$cafe->name}}</h4>
                <h4 class="card-text" style="display: inline-block">{{$cafe->description}}</h4>
            </div>
        </div>
        <h3 class="text-center mt-3">Все блюда</h3>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($cafe->foods as $food)
                @foreach($kitchens as $kitchen)
                    @if($food->kitchen_id === $kitchen->id)
                        <div class="col">
                            <h3 class="kitchen mt-2">Кухня: {{$kitchen->name}}</h3>
                            <div class="card" style="width: 300px; height: 300px">
                                <h4 class="card-title">{{$food->name}}</h4>
                                <a href="{{route('foods.show', ['food' => $food])}}">
                                    <img class="card-img-top" style="width: 300px; height: 300px"
                                         src="{{asset('storage/' . $food->picture)}}" alt="{{$food->picture}}">
                                </a>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endforeach
        </div>
    </div>
    <div class="container mt-5">
        <button type="submit" class="btn btn-warning mt-3">
            <a href="{{route('cafes.index')}}">Назад</a>
        </button>
    </div>
@endsection
