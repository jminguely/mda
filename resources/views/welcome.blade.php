@extends('layouts.main')

@section('main')
    <h1>Hello, {{ $name }}</h1>
@endsection

@section('sidebar')
    <h3>Latest posts</h3>
    <ul>
        @foreach($items as $item)
            <li>{{ $item->post_title }}</li>
        @endforeach
    </ul>
@endsection