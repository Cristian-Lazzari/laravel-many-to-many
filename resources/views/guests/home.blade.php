@extends('layouts.base')

@section('contents')
<ul>
    <li><a href="{{route('login')}}">login</a></li>
    <li><a href="{{route('admin.dashboard')}}">indexadmin</a></li>
</ul>
@endsection