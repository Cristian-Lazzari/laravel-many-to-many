@extends('layouts.base')

@section('contents')
    {{-- <img src="{{ Vite::asset('resources/img/picsum30.jpg') }}" alt=""> --}}
    <div class="cont_b">
        <div class="card">
            <p>{{$category->id}}</p>
            <h1>{{$category->name}}</h1>
            <h1>{{$category->description}}</h1>
        </div>
    </div>    

@endsection