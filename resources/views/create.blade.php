@extends("master")
@section("form")
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="card">
            <div class="panel-body">

                <form method="post" action="{{route("create.store")}}">
                    @csrf
                    <div class="form-group">
                        <label for="name">City Name:</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
