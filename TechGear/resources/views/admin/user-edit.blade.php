@extends('layouts.admin-main')

@section('middle')
	
	<div class="container">
		    <div class="row mt-4">
          <div class="col-12 pt-1">
            <h4 class="text-center text-danger mb-3">Edit User<a href="/admin/user-control" class=" float-right btn btn-danger btn-sm"><i class="fas fa-backward"> Back</i></a></h4>
          </div>          
        </div>
		
		@if ($errors->any())
    	<div class="alert alert-danger">
        	<ul>
            	@foreach ($errors->all() as $error)
                	<li>{{ $error }}</li>
            	@endforeach
        	</ul>
    	</div>
		@endif

		<form method="POST">
			@foreach($user as $u)
  			<div class="form-group">
    			<label class="text-primary">Full Name<i class='h5 text-danger'> ****</i></label></label>
    			<input type="text" class="form-control" name="name" value="{{$u->name}}">
    			<small class="form-text text-danger">Max Length of Full Name with Space is 20</small>
  			</div>
  			<div class="form-group">
    			<label class="text-primary">Email<i class='h5 text-danger'> ****</i></label></label>
    			<input type="email" class="form-control" name="email" value="{{$u->email}}">
    			<small class="form-text text-danger">Max Length is 30</small>
  			</div>
  			<div class="form-group">
    			<label class="text-primary">Password<i class='h5 text-danger'> ****</i></label></label>
    			<input type="text" class="form-control" name="password" value="{{$u->password}}">
    			<small class="form-text text-danger">Minimum Length is 5 & Max Length is 15 </small>
  			</div>
  			<div class="form-group">
    			<label class="text-primary">Address</label>
    			<input type="text" class="form-control" name="address" value="{{$u->address}}">
  			</div>
  			<button type="submit" class="btn btn-primary">Submit</button>
  			@endforeach
		</form>
	</div>
@endsection