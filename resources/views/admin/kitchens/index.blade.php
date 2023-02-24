@extends('layouts.admin')
@section('content')
    <div class="text-center">
        <h1 class="text" style="display: inline-block">Кухни</h1>
        <div class="mt-3 mx-3" style="display: inline-block">
            <button type="submit" class="btn btn-outline-primary">
                <a href="{{route('admin.kitchens.create')}}">
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
                    <th scope="col">Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($kitchens as $kitchen)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$kitchen->name}}</td>
                        <td>
                            <button class="btn btn-warning" style="display: inline-block">
                                <a href="{{route('admin.kitchens.edit', ['kitchen' => $kitchen])}}">
                                    Изменить
                                </a>
                            </button>
                            <form action="{{route('admin.kitchens.destroy', ['kitchen' => $kitchen])}}" method="post" style="display: inline-block">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger" style="display: inline-block">
                                    Удалить
                                </button>
                            </form>
                            <button class="btn btn-success" style="display: inline-block">
                                <a href="{{route('admin.kitchens.show', ['kitchen' => $kitchen])}}">
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
