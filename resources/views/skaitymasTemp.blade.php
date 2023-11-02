
@extends('layout')
@section('content')
    <h1>{{ $heading }}</h1>


        @foreach($lines as $line => $page)
            <h1> {{$lines[$line][0]['puslapis']}} </h1>
            @foreach($page as $key => $value)
               <p>{{$value['metrika']}} {{$value['puslapis']}},{{$value['eilute']}} {{$value['eilutes']}}</p>
            @endforeach
        @endforeach

@endsection
