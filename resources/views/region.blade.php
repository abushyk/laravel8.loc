@extends('layouts.app')

@section('content')
    <h1>{{$region->name}}</h1>
    <ul>
        @foreach($countries as $country)
            <li>
                <a href="{{route('country', $country)}}">{{$country->name}}</a>
            </li>
        @endforeach
    </ul>
@endsection
