@extends('admin.departments.layout')
@section('content')

<div class="card">
  <div class="card-header">Department Create</div>
  <div class="card-body">


      <form method="post" action="{{ url('admin/department') }}"  >
        {!! csrf_field() !!}
        <label>ID</label></br>
        <input type="number" name="id" id="id" class="form-control"></br>
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>


        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>

  </div>
</div>

@stop
