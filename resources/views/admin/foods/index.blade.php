@extends('layouts.admin')
@section('content')
    <div class="text-center">
        <h1 class="text" style="display: inline-block">Блюда</h1>
        <div class="mt-3 mx-3" style="display: inline-block">
            <button type="submit" class="btn btn-outline-primary">
                <a href="{{route('admin.foods.create')}}">
                    Добавить
                </a>
            </button>
        </div>
    </div>
    <div class="container">
        <div class="row mt-5 pb-5">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Название</th>
                    <th scope="col">Изображение</th>
                    <th scope="col">Цена</th>
                    <th scope="col">Описание</th>
                    <th scope="col">Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($foods as $food)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$food->name}}</td>
                        <td>
                            <img class="img-top" style="width: 100px;
                            height: 100px" src="{{asset('storage/' . $food->picture)}}"
                                 alt="{{$food->picture}}">
                        </td>
                        <td>{{$food->price}}</td>
                        <td>{{$food->description}}</td>
                        <td>
                            <button class="btn btn-warning" style="display: inline-block">
                                <a href="{{route('admin.foods.edit', ['food' => $food])}}">
                                    Изменить
                                </a>
                            </button>
                            <form action="{{route('admin.foods.destroy', ['food' => $food])}}" method="post" style="display: inline-block">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger" style="display: inline-block">
                                    Удалить
                                </button>
                            </form>
                            <button class="btn btn-success" style="display: inline-block">
                                <a href="{{route('admin.foods.show', ['food' => $food])}}">
                                    Просмотреть
                                </a>
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
