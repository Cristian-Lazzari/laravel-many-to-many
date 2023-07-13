@extends('layouts.base')

@section('contents')
    {{-- <img src="{{ Vite::asset('resources/img/picsum30.jpg') }}" alt=""> --}}

    @if (session('delete_success'))
        @php
            $project = session('delete_success')
        @endphp
        <div class="alert alert-danger">
            "{{ $project->title }}" has been deleted!!
            <form action="{{ route("admin.projects.restore", ['project' => $project] )}}" method="post">
                @csrf
                <button class="btn btn-warning">Restore</button>
            </form>
        </div>
    @endif

    @if (session('restore_success'))
        @php
            $project = session('restore_success')
        @endphp
        <div class="alert alert-success">
            "{{ $project->title }}" has been restored!!
            
        </div>
    @endif


    <div class="cont_a">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>CATEGORIA</th>
                    <th>LINK</th>
                    <th>COLLABORATORI</th>
                    <th>
                        <a class="btn btn-success" href="{{ route('admin.projects.create') }}">nuovo</a>
                        <a class="btn btn-danger" href="{{ route('admin.projects.trashed') }}">cestino</a>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <th>{{$project->id}}</th>
                        <td>{{$project->name}}</td>
                        <td>{{$project->category->name}}</td>
                        <td>{{$project->link}}</td>
                        <td></td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('admin.projects.show', ['project' =>$project]) }}">show</a>
                            <a class="btn btn-warning" href="{{ route('admin.projects.edit', ['project' =>$project]) }}">edit</a>
                            <form action="{{ route('admin.projects.destroy', ['project' =>$project])}}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" >delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>    

@endsection
