@extends('layouts.user-main')

@section('title')
	<title>Edit Account</title>
@endsection

@section('main')
  		<div class="col-6 p-3 mb-2 bg-dark text-white offset-3">
  			<h4 class="text-center">Your Personal Informations</h4>
  			</br>
              
  			<form method="post">
  				@if(!session()->has('old'))
  					@foreach($result as $user)
  					<div class="form-group">
  					<label>Full Name<span class="text-danger">***</span></label>
  					<input type="text" class="form-control" name="name" Value="{{ $user->name}}" maxlength="30" required>
  					<input type="hidden" name="uid" Value="{{$user->id}}">
  					@foreach ($errors->get('name') as $error)
			    	<small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> {{  $error }}</i></small>		  
			    	@endforeach
					</div>
					<div class="form-group">
  					<label>Email<span class="text-danger">***</span></label>
  					<input type="text" class="form-control" name="email" id="email" Value="{{$user->email}}" maxlength="40" required>
  					@foreach ($errors->get('email') as $error)
			    	<small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> {{  $error }}</i></small>		  
			    	@endforeach
			    	@if(session('emailExist'))
			    	<small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> {{  session('emailExist') }}</i></small>
			    	@endif
					</div>
					<div class="form-group">
  					<label>Phone Number<span class="text-danger">***</span></label>
  					<input type="text" class="form-control" name="phone" Value="{{$user->phone}}" maxlength="11" required>
  					@foreach ($errors->get('phone') as $error)
			    	<small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> {{  $error }}</i></small>		  
			    	@endforeach
					</div>
					<div class="form-group">
  					<label>Fax</label>
  					<input type="text" class="form-control" name="fax" Value="{{$user->fax}}" maxlength="11">
  					@foreach ($errors->get('fax') as $error)
			    	<small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> {{  $error }}</i></small>		  
			    	@endforeach
					</div>
					<button type="submit" class="btn btn-primary">Save</button>
  					<a href="/user/home" class="btn float-right btn-primary">Cancel</a>
  					<?php break; ?>
  					@endforeach  				
  				@elseif((session()->has('old')))
  				<div class="form-group">
  					<label>Full Name<span class="text-danger">***</span></label>
  					<input type="text" class="form-control" name="name" Value="{{ old('name') }}" maxlength="30" required>
  					<input type="hidden" name="uid" Value="{{Session::get('id')}}">
  					@foreach ($errors->get('name') as $error)
			    	<small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> {{  $error }}</i></small>		  
			    	@endforeach
					</div>
					<div class="form-group">
  					<label>Email<span class="text-danger">***</span></label>
  					<input type="text" class="form-control" name="email" id="email" Value="{{ old('email') }}" maxlength="40" required>
  					@foreach ($errors->get('email') as $error)
			    	<small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> {{  $error }}</i></small>		  
			    	@endforeach
			    	@if(session('emailExist'))
			    	<small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> {{  session('emailExist') }}</i></small>
			    	@endif
					</div>
					<div class="form-group">
  					<label>Phone Number<span class="text-danger">***</span></label>
  					<input type="text" class="form-control" name="phone" Value="{{ old('phone') }}" maxlength="11" required>
  					@foreach ($errors->get('phone') as $error)
			    	<small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> {{  $error }}</i></small>		  
			    	@endforeach
					</div>
					<div class="form-group">
  					<label>Fax</label>
  					<input type="text" class="form-control" name="fax" Value="{{ old('fax') }}" maxlength="11">
  					@foreach ($errors->get('fax') as $error)
			    	<small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> {{  $error }}</i></small>		  
			    	@endforeach
					</div>
					<button type="submit" class="btn btn-primary">Save</button>
  					<a href="/user/home" class="btn float-right btn-primary">Cancel</a>
  				@endif
  			</form>
              
  		</div>	
@endsection

@section('script')
	<!-- <script>
		$(document).ready(function(){

			$("").submit(function(event) {
				//event.preventDefault();
				var email = $('#email').val();
				var id = 14;//$('#uid').val();
				console.log(email);
				//console.log(id);				
				$.ajax({
					url:"/test/5",
					method:"POST",
					data:{email:email, id:id},
					success:function(data){
						console.log(data);
					}
				});

			});
		});
	</script> -->
@endsection