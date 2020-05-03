@extends('layouts.user-main')

@section('title')
	<title>Change Password</title>
@endsection

@section('main')
  		<div class="col-6 py-3 mb-2 bg-dark text-white offset-3">
  			<h4 class="text-center">Change Your Password</h4>
  			</br>
  			<form method="post">
  				<div class="form-group">
  					<label>Password<span class="text-danger">***</span></label>
  					<input type="password" class="form-control" name="password" maxlength="15" required>
  					@foreach ($errors->get('password') as $error)
			    	<small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> {{  $error }}</i></small>		  
			    	@endforeach
				</div>
				<div class="form-group">
  					<label>Confirm Password<span class="text-danger">***</span></label>
  					<input type="password" class="form-control" name="confirmPassword" maxlength="15" required>
  					@foreach ($errors->get('confirmPassword') as $error)
			    	<small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> {{  $error }}</i></small>		  
			    	@endforeach		   
				</div>					
				<button type="submit" class="btn btn-primary">Submit</button>
  				<a href="/user/home" class="btn float-right btn-primary">Cancel</a>
  			</form>           
  		</div>	
@endsection

@section('script')

@endsection