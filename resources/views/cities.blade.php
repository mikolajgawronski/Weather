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
                <td><button type="button" class="btn btn-primary">Open</button> <button type="button" class="btn btn-danger">Delete</button></td>
            </tr>
        @endforeach
        <tr>
            <td></td>
            <td><button type="button" class="btn btn-success">Add a City</button></td>
        </tr>
        </tbody>
    </table>
</div>
@stop
