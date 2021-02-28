@extends('layouts.master')

@section('title')
			Welcome to Admin
@endsection()



@section('content')

<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Employee's Time History</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <!-- fetch table data -->
                 <!--      <th>Id</th>
                      <th>Emplyee</th>
                      -->
                      <th>Date</th> 
                      <th>Clock In</th>
                      <th>Clock Out</th>
                      <th>Spand Time</th>
                    </thead>
                    <tbody>
                      <!--fetch table data -->
                      @foreach($history as $row)
                      <tr>
                        <td>{{ $row->date }}</td>                        
                        <td>{{ $row->start_time }}</td>
                        <td>{{ $row->end_time }}</td>
                        <td>

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