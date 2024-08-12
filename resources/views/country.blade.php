<h1>{{$country->name}}</h1>
<ul>
    @foreach($regions as $region)
        <li>
            <a href="{{route('located.region', $region)}}">{{$region->name}}</a>
        </li>
    @endforeach
</ul>

