@extends('layouts.base')

@section('contents')
    {{-- <img src="{{ Vite::asset('resources/img/picsum30.jpg') }}" alt=""> --}}

    @if (session('delete_success'))
        @php
            $category = session('delete_success')
        @endphp
        <div class="alert alert-danger">
            "{{ $category->title }}" has been deleted!!
            <form action="{{ route("admin.categories.restore", ['category' => $category] )}}" method="post">
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
                        <a class="btn btn-success" href="{{ route('admin.categories.create') }}">nuovo</a>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <th>{{$category->id}}</th>
                        <td>{{$category->name}}</td>

                        <td></td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('admin.categories.show', ['category' =>$category]) }}">show</a>
                            <a class="btn btn-warning" href="{{ route('admin.categories.edit', ['category' =>$category]) }}">edit</a>
                            <form action="{{ route('admin.categories.destroy', ['category' =>$category])}}" method="post">
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
