@extends('admin.departments.layout')
@section('content')

<div class="card">
  <div class="card-header">Department page</div>
  <div class="card-body">

    <form action="{{ url('admin/department/' .$departments->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")

        <input type="hidden" name="id" id="id" value="{{$departments->id}}" id="id" />
        <label>Name</label></br>
        <input type="text" name="name" id="name" value="{{$departments->name}}" class="form-control"></br>

        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>

  </div>
</div>

@stop
