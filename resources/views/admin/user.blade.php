@extends('layouts.master')

@section('title')
			Welcome to Admin
@endsection()



@section('content')

<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> All Employee's</h4>
                <div class="text-right"><a href="{{ URL::to('add-user') }}" class=" btn btn-primary">Add New Employee</a></div>
                 
                        
                  <!-- for show the message updadated copy from home.blade.phpfile-->
                 @if (session('status'))
                              <div class="alert alert-success" role="alert">
                                  {{ session('status') }}
                              </div>
                  @endif
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <!-- fetch table data -->
                      <th>Id</th>
                      <th>Name</th>
                      <th>Phone</th>
                      <th>Email</th>
                      <!-- <th>Type</th> -->
                      <th>Edit</th>
                      <th>Delete</th>
                    </thead>
                    <tbody>
                      <!--fetch table data -->
                      @foreach($users as $row)
                      <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->phone }}</td>
                        <td>{{ $row->email }}</td>
                        <!-- <td>
                          @if($row->usertype )
                              {{ $row->usertype }}
                          @else
                              employee
                          @endif
                        </td> -->
                        <td>
                          <a href="{{ URL::to('role-edit').'/'.$row->id }}" class="btn btn-success">EDIT</a>
                        </td>
                        <td>
                          <!-- we have to add form method because without form method it will show error-->
                          <form action="{{ URL::to('role-delete').'/'.$row->id}}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger">DELETE</button> 
                          </form>
                        </td>
                       </tr>
                       @endforeach()
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection()

@section('scripts')


@endsection()