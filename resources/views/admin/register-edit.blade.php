@extends('layouts.master')

@section('title')
			Edit-Registered Employee:
@endsection()

@section('content')
			
<div class="container">
	<div class="row">
		<div class="col-md-12"><!-- 12 row -->
			<div class="card">
				<div class="card-header">
					<h3>Edit Employee's</h3>
				
				</div>
				<div class="card-body">
		          @if (session('status'))
                  <div class="alert alert-success" role="alert">
                      {{ session('status') }}
                  </div>
                  @endif
					<div class="row">
						<div class="col-md-8"> <!--col-md-8 means 8 row  and form put into one row and updtate the button below-->
							<form action="{{ URL::to('user-update').'/'.$users->id }}" method="POST" ><!-- here we update the button-->
								{{ csrf_field() }}
								{{ method_field('PUT') }}
						<div class="form-group">
				    		<label>First Name</label>
				    		<input id="fname" type="text" class="form-control @error('fname') is-invalid @enderror" name="fname"  value="{{ $users->fname }}" required autocomplete="fname" autofocus>
                            @error('fname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
				     	</div>

				     	<div class="form-group">
				    		<label>Last Name</label>
				    		 <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{ $users->lname }}" required autocomplete="lname" autofocus>

                                @error('lname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
				     	</div>				     	
				     	<div class="form-group">
				    		<label>Give Role</label>
				    		<select name="usertype" class="form-control">
				    			<option value="employee">Employee</option>
				    			<option value="admin">Admin</option>
				    			<option value="">None</option>
				    		</select>
				     	</div>
				     	<div class="form-group">
				    		<label>Phone</label>
				    		<input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $users->phone }}" required autocomplete="phone" autofocus>

                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
				     	</div>
				     	<div class="form-group">
				    		<label>Email</label>
				    		<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $users->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
				     	</div>
				     	<div class="form-group">
				    		<label>Address</label>
				    		 <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{  $users->address }}" required autocomplete="address" autofocus>
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            
				     	</div>

				     	<div class="form-group">
				    		<label>Profile</label>
				    		<input type="file" name="profile" value="{{ $users->profile }}" class="form-control">
				     	</div>

				     	<button type="Submit" class="btn btn-success">Submit</button>
				     	<a href="/role-register" class="btn btn-danger">Cancel</a>
					</form>
						</div>
					</div>

				</div>
					
			</div>
		</div>
	</div>
</div>
			
@endsection()

@section('scripts')


@endsection()