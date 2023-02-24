@extends('layouts.app')
@section('content')
    <div class="container">
        <div>
            <h3 class="text-center">Все блюда</h3>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach($foods as $food)
                    <div class="col">
                        <div class="card my-2 text-center" >
                            <a href="{{route('foods.show', ['food' => $food])}}">
                                <img class="" style="width: 400px; height: 300px"
                                     src="{{asset('storage/' . $food->picture)}}" alt="{{$food->picture}}">
                                <h4 class="card-title text-center">Наименование: {{$food->name}}</h4>
                                <h4 class="card-body text-center">Цена: {{$food->price}} сом</h4>
                            </a>
                            <form class="card-body text-center" id="create-basket">
                                <div class="number" style="padding-bottom: 15px">
                                    <span class="minus" id="minus">-</span>
                                    <input type="text" id="qty-{{$food->id}}" name="qty" value="1" size="7"/>
                                    <span class="plus" id="plus">+</span>
                                </div>
                                <button class="basket" data-create-id="{{$food->id}}">В корзину</button>
                            </form>
                        </div>
                    </div>
                @endforeach
                <div class="justify-content-md-center p-5">
                    <div class="col-md-auto">
                        {{ $foods->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

