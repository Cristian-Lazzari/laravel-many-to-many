@extends('layouts.base')

@section('contents')
    {{-- <img src="{{ Vite::asset('resources/img/picsum30.jpg') }}" alt=""> --}}
    <div class="cont_b">
        <div class="card">
            <h1>{{$project->name}}</h1>
            <img src="{{$project->url_image}}" alt="">
            <img src="{{$project->url_gif}}" alt="">        
            <h5>{{$project->link}}</h5>
            <h5>{{$project->link_github}}</h5>
            <p>{{$project->description}}</p>
            <p>{{$project->id}}</p>
        </div>
    </div>    

@endsection