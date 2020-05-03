@extends('layouts.admin-main')

@section('middle')
    <div class="container">
    </br>
    </br>
    	<div class="row">
    		<div class="col-4 p-3 mb-2 bg-dark text-white offset-4">
    			<h4 class="text-center">Your Account's Informations</h4>
    			</br>
                <?php $oldData = session()->get('oldData');  ?>
                @foreach($result as $admin)
    			<form method="POST">
    				<div class="form-group">
    					<label>Name<span class="text-danger">***</span></label>
                        @if($oldData)
                        <input type="text" class="form-control" name="name"  Value="<?php echo array_pop($oldData); ?>" required>
    					@else
                        <input type="text" class="form-control" name="name"  Value="{{$admin->name}}" required>
    					@endif
                        @foreach ($errors->get('name') as $error)
                        <small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> {{  $error }}</i></small>        
                        @endforeach
  					</div>
  					<div class="form-group">
    					<label>Email<span class="text-danger">***</span></label>
                        @if($oldData)
                        <input type="text" class="form-control" name="email"  Value="<?php echo array_pop($oldData); ?>" required>
    					@else
                        <input type="text" class="form-control" name="email"  Value="{{$admin->email}}" required>
    					@endif
                        @foreach ($errors->get('email') as $error)
                        <small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> {{  $error }}</i></small>        
                        @endforeach
  					</div>
  					<div class="form-group">
    					<label>Password</label>
                        <input type="text" class="form-control" name="password">    					
    					@foreach ($errors->get('password') as $error)
                        <small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> {{  $error }}</i></small>        
                        @endforeach
  					</div>
  					<div class="form-group">
    					<label>Confirm Password</label>
                        <input type="text" class="form-control" name="confirm_password">
    					@foreach ($errors->get('confirm_password') as $error)
                        <small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> {{  $error }}</i></small>        
                        @endforeach
  					</div>
  					<button type="submit" class="btn btn-primary">Save</button>
    				<a href="/admin/home" class="btn float-right btn-primary">Cancel</a>
    			</form>
                <?php break; ?>
                @endforeach
    		</div>
    		<!-- <div class="col-4 bg-success">
    			<h4>1</h4>
    		</div>
    		<div class="col-4 bg-danger">
    			<h4>1</h4>
    		</div> -->
    	</div>
    </div>
@endsection