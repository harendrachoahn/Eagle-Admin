@extends('layouts.master')

@section('title')
	Eagle Shunt Transportation Services| Transport |Shunting
@endsection()

@section('content')


<div class="row">

          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> <!-- Dashboard --></h4>
              </div>
              <div class="card-body">
              <!----Box's---->
              <div class="row">
                <div class="col-md-3 col-sm-6 ">
                    <div class="panel panel-sky">                      
                        <div class="panel-body">
                          <div class="row">
                            <div class="panel-icon col-sm-3">
                                <i class="now-ui-icons users_single-02"></i>
                            </div>
                            <div class="widget-details col-sm-9">
                                <h3>{{$total_employee}}</h3>
                                <b>Total <br>Employee's</b>
                            </div>                            
                          </div>
                        </div>
                    </div> 
                  </div>
                  <div class="col-md-3 col-sm-6 ">
                    <div class="panel panel-green">                      
                        <div class="panel-body">
                          <div class="row">
                            <div class="panel-icon col-sm-3">
                                <i class="now-ui-icons users_single-02"></i>
                            </div>
                            <div class="widget-details col-sm-9">
                                <h3>{{$today_employee}}</h3>
                                <b>Today <br>Registered</b>
                            </div>                            
                          </div>
                        </div>
                    </div> 
                  </div>
                  <div class="col-md-3 col-sm-6 ">
                    <div class="panel panel-sky">                      
                        <div class="panel-body">
                          <div class="row">
                            <div class="panel-icon col-sm-3">
                                <i class="now-ui-icons users_single-02"></i>
                            </div>
                            <div class="widget-details col-sm-9">
                                <h3>{{$total_employee}}</h3>
                                <b>Total <br>Employee's</b>
                            </div>                            
                          </div>
                        </div>
                    </div> 
                  </div>
                  <div class="col-md-3 col-sm-6 ">
                    <div class="panel panel-green">                      
                        <div class="panel-body">
                          <div class="row">
                            <div class="panel-icon col-sm-6">
                                <i class="now-ui-icons users_single-02"></i>
                            </div>
                            <div class="widget-details col-sm-6">
                                <h3>{{$today_employee}}</h3>
                                <b>Today <br>Registered</b>
                            </div>                            
                          </div>
                        </div>
                    </div> 
                  </div>

                </div>

                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>Name</th>
                      <th>Country</th>
                      <th>City</th>
                      <th>Salary</th>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Harendra</td>
                        <td>India</td>
                        <td>Uttarakhand</td>
                        <td>None</td>
                       </tr>
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