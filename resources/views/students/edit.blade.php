
@extends('students.layout')

@section('content')
<div class="row">
  <div class="col-md-12">
    @if (session('status'))
              <h6 class="alert alert-success">{{ session('status') }}</h6>
    @endif

    <div class="card">
      <div class="card-header">

        <a href="{{url('students')}}" class="btn btn-danger">Back</a>
      </div>
      <div class="card-body">
        <form action="{{ url('update-student/'.$student->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
        <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" name="name" value="{{$student->name}}" class="form-control" id="" placeholder="Name">
        </div>
        <div class="form-group">
            <label for="email">Email Id</label>
            <input type="text" name="email" value="{{$student->email}}"  class="form-control" id="" placeholder="Email">
        </div>

        <div class="form-group">
            <label for="profile_image">profile image</label>
            <input type="file" name="profile_image"  value="{{$student->profile_image}}" class="form-control" id="" placeholder="profile image">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>

        </form>
      </div>
    </div>
  </div>
</div>
@endsection
