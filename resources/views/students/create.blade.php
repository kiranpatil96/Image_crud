
@extends('students.layout')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">

        <a href="{{url('students')}}" class="btn btn-danger">Back</a>
      </div>
      <div class="card-body">
        <form action="{{url('add-students')}}" method="POST" enctype="multipart/form-data">
          @csrf
        <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" name="name" class="form-control" id="" placeholder="Name">
        </div>
        <div class="form-group">
            <label for="email">Email Id</label>
            <input type="text" name="email" class="form-control" id="" placeholder="Email">
        </div>

        <div class="form-group">
            <label for="profile_image">profile image</label>
            <input type="file" name="profile_image" class="form-control" id="" placeholder="profile image">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Add</button>
        </div>

        </form>
      </div>
    </div>
  </div>
</div>
@endsection
