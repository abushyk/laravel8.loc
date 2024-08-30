@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{$country->name}}</h1>
        <ul>
            @foreach($regions as $region)
                <li>
                    <a href="{{route('region', $region)}}">{{$region->name}}</a>
                </li>
            @endforeach
        </ul>
    </div>

@endsection
