@extends("master")
@section("cities")
<div class="table-responsive">
    <table class="table table-bordered table-light">
        <thead>
        <tr>
            <th scope="col">City</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($city as $city)
            <tr>
                <td>{{ $city['name'] }}</td>
                <td><a class="btn btn-primary" href={{url($city->id)}}>Open</a></td>
            </tr>
        @endforeach
        <tr>
            <td></td>
            <td><a class="btn btn-success" href="/create">Add a City</a> </td>
        </tr>
        </tbody>
    </table>
</div>
@stop
