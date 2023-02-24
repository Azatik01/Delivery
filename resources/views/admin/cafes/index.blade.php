@extends('layouts.admin')
@section('content')
    <div class="text-center">
        <h1 class="text" style="display: inline-block">Кафе</h1>
        <div class="mt-3 mx-3" style="display: inline-block">
            <button type="submit" class="btn btn-outline-primary">
                <a href="{{route('admin.cafes.create')}}">
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
                    <th scope="col">Описание</th>
                    <th scope="col">Категория</th>
                    <th scope="col">Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cafes as $cafe)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$cafe->name}}</td>
                        <td>
                            <img class="img-top" style="width: 100px;
                            height: 100px" src="{{asset('storage/' . $cafe->picture)}}"
                                 alt="{{$cafe->picture}}">
                        </td>
                        <td>{{$cafe->description}}</td>
                        <td>{{$cafe->category}}</td>
                        <td>
                            <button class="btn btn-warning" style="display: inline-block">
                                <a href="{{route('admin.cafes.edit', ['cafe' => $cafe])}}">
                                    Изменить
                                </a>
                            </button>
                            <form action="{{route('admin.cafes.destroy', ['cafe' => $cafe])}}" method="post" style="display: inline-block">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger" style="display: inline-block">
                                    Удалить
                                </button>
                            </form>
                            <button class="btn btn-success" style="display: inline-block">
                                <a href="{{route('admin.cafes.show', ['cafe' => $cafe])}}">
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
