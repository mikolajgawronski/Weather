@extends("master")
@section("form")
<div class="row">
    <div class="col-md-4">
        <div>
            <div>
                <form method="post" action="{{route("create.store")}}">
                    @csrf
                    <div class="form-group">
                        <label for="name">City Name:</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
