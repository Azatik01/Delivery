@extends('layouts.app')
@section('content')
    <div class="container">
        <div>
            <h3 class="text-center">Все кафешки</h3>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach($cafes as $cafe)
                    <div class="col">
                        <div class="card my-2" style="width: 300px; height: 300px">
                            <a href="{{route('cafes.show', ['cafe' => $cafe])}}">
                                <h4 class="card-title text-center">{{$cafe->name}}</h4>
                                <img class="" style="width: 300px; height: 300px" src="{{asset('storage/' . $cafe->picture)}}" alt="{{$cafe->picture}}">
                            </a>
                        </div>
                    </div>
                @endforeach
                <div class="justify-content-md-center p-5">
                    <div class="col-md-auto">
                        {{ $cafes->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
