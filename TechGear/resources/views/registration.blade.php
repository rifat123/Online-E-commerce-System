@extends('layouts.main')

@section('title')
	<title>Registration</title>
@endsection

@section('middle')	
	<section id="form">
		<div class="container">
			<div class="mx-auto mt-4 px-4 py-5 border border-primary rounded bg-dark" style="width:400px">
				<h4 class="text-center text-white">Create An Account</h4></br>
				<form method="POST">
			  		<div class="form-group">			    		
			    		<input type="text" class="form-control" name="name" value="{{ old('name') }}" maxlength=30 placeholder="Full Name***" required>	
			  		</div>
			  		
			  		<div class="form-group">			    		
			    		<input type="text" class="form-control" name="email" value="{{ old('email') }}" maxlength=40 placeholder="Email Address***" required>
			    		@foreach ($errors->get('email') as $error)
			    		<small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> {{  $error }}</i></small>		  
			    		@endforeach
			  		</div>
			  		<div class="form-group">		    		
			    		<input type="password" class="form-control" name="password" placeholder="Password***" maxlength=20  required>
			    		@foreach ($errors->get('password') as $error)
			  			<small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> {{ $error }}</i></small>		  
			  			@endforeach
			  		</div>
			  		<div class="form-group">		    		
			    		<input type="password" class="form-control" name="confirmPassword" placeholder="Confirm Password***" maxlength=20  required>			    		
			  			@foreach ($errors->get('confirmPassword') as $error)
			  			<small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> {{ $error }}</i></small>		  
			  			@endforeach
			  		</div>			  				  
			  		<button type="submit" class="btn btn-primary btn-block">Signup</button>
				</form>
				@if(session('success'))
					<h6 class="text-success text-center mt-4">{{session('success')}}</h6>
				@endif
			</div>
		</div>
	</section>
@endsection