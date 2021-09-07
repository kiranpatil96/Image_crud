
@extends('students.layout')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">

        <a href="{{url('add-students')}}" class="btn btn-primary">Add student</a>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-table-striped">
          <thead>
            <tr>
              <th>Sr No</th>
              <th>Name</th>
              <th>Email</th>
              <th>Profile Image</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            @foreach($student as $data)
            <tr>
              <td>{{$data->id}}</td>
              <td>{{$data->name}}</td>
              <td>{{$data->email}}</td>
              <td>
                  <img src="{{ asset('public/uploads/images/'.$data->profile_image) }}" width="120px" height="70px" alt="Image"
              </td>
              <td>
                <a href="{{ url('edit-student/'.$data->id) }}" class="btn btn-primary btn-sm">Edit</a>
              </td>
              <td>
                <form action="{{ url('delete-student/'.$data->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </card>
  </div>
</div>


@endsection
