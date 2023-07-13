@extends('layouts.base')

@section('contents')
    {{-- <img src="{{ Vite::asset('resources/img/picsum30.jpg') }}" alt=""> --}}
    <div class="cont_b">
        <div class="card">
            <p>{{$tag->id}}</p>
            <h1>{{$tag->name}}</h1>
            <h1>{{$tag->description}}</h1>
        </div>
    </div>    

@endsection