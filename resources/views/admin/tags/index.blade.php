@extends('layouts.base')

@section('contents')
    {{-- <img src="{{ Vite::asset('resources/img/picsum30.jpg') }}" alt=""> --}}

    @if (session('delete_success'))
        @php
            $tag = session('delete_success')
        @endphp
        <div class="alert alert-danger">
            "{{ $tag->title }}" has been deleted!!
            <form action="{{ route("admin.tags.restore", ['tag' => $tag] )}}" method="post">
                @csrf
                <button class="btn btn-warning">Restore</button>
            </form>
        </div>
    @endif

    <div class="cont_a">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOME</th>

                    <th>
                        <a class="btn btn-success" href="{{ route('admin.tags.create') }}">nuovo</a>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                    <tr>
                        <th>{{$tag->id}}</th>
                        <td>{{$tag->name}}</td>

                        <td></td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('admin.tags.show', ['tag' =>$tag]) }}">show</a>
                            <a class="btn btn-warning" href="{{ route('admin.tags.edit', ['tag' =>$tag]) }}">edit</a>
                            <form action="{{ route('admin.tags.destroy', ['tag' =>$tag])}}" method="post">
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
