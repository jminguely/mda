@extends('layouts.main')

@section('main')
    <h1>Hello, {{ $name }}</h1>
    <div class="mosaic">
    <svg height="0" xmlns="http://www.w3.org/2000/svg">

        <filter id='grayscaledBlur'>

            <feGaussianBlur color-interpolation-filters="sRGB" stdDeviation="4" />
            <feOffset width="480" x="0" />
            <feComponentTransfer>
            <feFuncA tableValues="1 1" type="discrete" />
            </feComponentTransfer>
            <feComposite in2="SourceGraphic" operator="atop" />

            <feColorMatrix type='matrix' values='
            0.9 0.9 0.9 0.2
            0.2 0.9 0.9 0.9
            0.2 0.2 0.9 0.9 
            0.9 0.2 0.2 0.2 
            0.2 0.2 1 0'/>

        </filter>


    </svg>
        <div class="block">
            <img src="https://s.cdpn.io/387787/blur.jpg" alt="">
        </div>
    </div>
@endsection

@section('sidebar')
    <h3>Latest posts</h3>
    <ul>
        @foreach($items as $item)
            <li>{{ $item->post_title }}</li>
        @endforeach
    </ul>
@endsection