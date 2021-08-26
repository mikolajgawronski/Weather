@extends("master")
@section("weather")
<div class="table-responsive">

    <h1>{{$weather[0]["city"]["name"]}}</h1>
    <br>
    <table class="table table-bordered table-light">
        <thead>
        <tr>
            <th scope="col">Weather</th>
            <th scope="col">Description</th>
            <th scope="col">Temperature</th>
            <th scope="col">Pressure</th>
            <th scope="col">Humidity</th>
            <th scope="col">Visibility</th>
            <th scope="col">Wind Speed</th>
        </tr>
        </thead>
        <tbody>
        @foreach($weather as $weather)
            <tr>
                <td>{{ $weather["main"] }}</td>
                <td>{{ $weather["description"] }}</td>
                <td>{{ $weather["temperature"]}} C</td>
                <td>{{ $weather["pressure"] }} hPa</td>
                <td>{{ $weather["humidity"] }} %</td>
                <td>{{ $weather["visibility"] }} km</td>
                <td>{{ $weather["wind_speed"] }} m/s</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@stop
