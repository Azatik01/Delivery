@extends('layouts.app')
@section('content')
    <div class="container">
        <div>
            <h3 class="text-center">Корзина</h3>
            <div class="delete-all mt-3 text-center">
                <form action="{{action([\App\Http\Controllers\BasketController::class, 'deleteAll'])}}" class="basket-delete-all" method="GET">
                    <button type="submit"
                            class="mt-3 btn btn-outline-danger btn-sm btn-block">
                        Очистить корзину
                    </button>
                </form>
                <div class="text-center mt-3 cost">
                    <h3 class="">
                        Общая цена: {{$cost}} сом
                    </h3>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach($baskets as $basket)
                    <div class="col"  id="basket-{{$basket->id}}">
                        <div class="card my-2 text-center" >
                            <a href="{{route('foods.show', ['food' => $basket->food])}}">
                                <img class="" style="width: 300px; height: 300px"
                                     src="{{asset('storage/' . $basket->food->picture)}}"
                                     alt="{{$basket->food->picture}}">
                                <h4 class="card-title">{{$basket->food->name}}</h4>
                            </a>
                            <form id="update-food" method="POST">
                                @method('put')
                                @csrf
                                <input type="hidden" id="basket_id" name="basket_id" value="{{$basket->id}}">
                                <div class="number" style="padding-bottom: 15px">
                                    <span class="minus" id="minus">-</span>
                                    <input type="text" name="qty" value="{{$basket->qty}}" size="7"/>
                                    <span class="plus" id="plus">+</span>
                                </div>
                                <button id="update-food-btn" type="submit"
                                        class=" btn btn-outline-warning btn-sm btn-block update-food-btn">
                                    Изменить
                                </button>
                            </form>

                            <form class="basket-delete" method="POST">
                                @method("delete")
                                <button type="submit" data-basket-id="{{$basket->id}}"
                                        class="mt-3 btn btn-outline-danger btn-sm btn-block delete-comment-btn">
                                    Очистить
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
