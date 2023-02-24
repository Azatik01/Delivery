@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <div class="card" style="width: 300px; height: 300px">
                        <a href="{{route('foods.show', ['food' => $food])}}">
                            <img class="card-img-top" style="width: 300px; height: 300px"
                                 src="{{asset('storage/' . $food->picture)}}" alt="{{$food->picture}}">
                        </a>
                        <div class="text-center">
                            <h4 class="card-title">Название: {{$food->name}}</h4>
                            <h4 class="card-title">Цена: {{$food->price}} сом</h4>
                            <h4 class="card-body">Описание: {{$food->description}}</h4>
                        </div>
                        <form action="{{route('baskets.store')}}" id="create-basket">
                            @method('post')
                            @csrf
                            <input type="hidden" id="food_id" name="food_id" value="{{$food->id}}">
                            <div class="number" style="padding-bottom: 15px">
                                <span class="minus" id="minus">-</span>
                                <input type="text" name="qty" value="1" size="7"/>
                                <span class="plus" id="plus">+</span>
                            </div>
                            <button class="basket">В корзину</button>
                        </form>
                    </div>
                </div>
        </div>
    </div>
@endsection
