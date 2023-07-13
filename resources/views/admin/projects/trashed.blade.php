@extends('layouts.base')

@section('contents')
    <h1>Trash projects</h1>

    @if (session('delete_success'))
        @php
            $project = session('delete_success')
        @endphp
        <div class="alert alert-danger">
            "{{ $project->title }}" has been deleted!!
        </div>
    @endif

    @if (session('restore_success'))
    @php
        $project = session('restore_success')
    @endphp
    <div class="alert alert-success">
        "{{ $project->title }}" has been deleted!!
        
    </div>
@endif

    <div class="container">
        <div class="row row-cols-3">
            @foreach ($trashedProjects as $project)
                <div class="col mb-3">
                    <div class="card h-100">
                        <img src="{{ $project->thumb }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $project->id }}</h5>
                            {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{ $project->name }}</li>
                            <li class="list-group-item">{{ $project->link }}</li>
                        </ul>
                        <div class="card-body">
                            <a href="{{ route('admin.projects.show', ['project' => $project->id]) }}" class="btn btn-primary">project info</a>
                            <form action="{{ route('admin.projects.restore', ['project' => $project->id]) }}" method="POST" class="d-inline-block">
                                @csrf
                                <button class="btn btn-warning" href="">Restored</button>
                            </form>
    
                            <form action="{{ route('admin.projects.hardDelete', ['project' => $project->id]) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('delete')
                                <button class="hard_delete btn btn-danger" href="">Hard Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    {{ $trashedProjects->links() }}

@endsection