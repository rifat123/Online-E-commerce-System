@extends('layouts.main')

@section('title')
	<title>Login</title>
@endsection

@section('middle')	
	<section id="form"><!--form-->
		<div class="container">
			<div class="mx-auto mt-5 px-4 py-5 border border-primary rounded bg-dark" style="width:400px">
				<h4 class="text-center text-white">Login To Your Account</h4></br>
				<form method="POST">			  		
			  		<div class="form-group">			    		
			    		<input type="text" class="form-control" name="email" value="{{ old('email') }}" maxlength=40 placeholder="Email Address***" required>
			    		@foreach ($errors->get('email') as $error)
			    		<small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> {{  $error }}</i></small>		  
			    		@endforeach
			    		@if(session()->get('msg'))
			    		<small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle">{{session()->get('msg')}}</i></small>
			    		@endif
			  		</div>
			  		<div class="form-group">		    		
			    		<input type="password" class="form-control" name="password" placeholder="Password***" maxlength=20  required>
			    		@foreach ($errors->get('password') as $error)
			  			<small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> {{ $error }}</i></small>		  
			  			@endforeach
			  		</div>
			  		<div class="form-group">
			  			<a href="" class="text-info" style="text-decoration:none">Forgot Password?</a>
			 		</div>			  					  				  
			  		<button type="submit" class="btn btn-primary btn-block">Login</button>
				</form>
			</div>
		</div>
		</br></br>
	</section><!--/form-->	
@endsection