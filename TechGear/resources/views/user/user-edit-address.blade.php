@extends('layouts.user-main')

@section('title')
	<title>Edit Address</title>
@endsection

@if($opt == "ab")
@section(
'main')
@elseif($opt == "check" || $opt == "ho")
@section('middle')
</br>
@endif
	<div class="col-6 p-3 mb-2 bg-dark text-white offset-3">
  		<h4 class="text-center">Edit Address</h4>
  		</br>              
  		<form method="post">
  		@if(!session()->has('old1'))
  			@foreach($result as $address)  					
  			<div class="form-group">
  				<label>Full Name<span class="text-danger">***</span></label>
  				<input type="text" class="form-control form-control-sm" name="name" Value="{{$address->name}}" maxlength="30" required>
  				@foreach ($errors->get('name') as $error)
			    <small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> {{  $error }}</i></small>		  
			    @endforeach
			</div>
			<div class="form-group">
  				<label>Company</label>
  				<input type="text" class="form-control form-control-sm" name="company" Value="{{$address->company}}" maxlength="50">
  				@foreach ($errors->get('company') as $error)
			    <small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> {{  $error }}</i></small>		  
			    @endforeach			    	
			</div>
			<div class="form-group">
  				<label>Address 1<span class="text-danger">***</span></label>
  				<input type="text" class="form-control form-control-sm" name="address_1" Value="{{$address->address_1}}" maxlength="50" required>
  				@foreach ($errors->get('address_1') as $error)
			    <small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> {{  $error }}</i></small>		  
			    @endforeach
			</div>
			<div class="form-group">
  				<label>Address 2</label>
  				<input type="text" class="form-control form-control-sm" name="address_2" Value="{{$address->address_2}}" maxlength="50">
  				@foreach ($errors->get('address_2') as $error)
			    <small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> {{  $error }}</i></small>		  
			    @endforeach
			</div>
			<div class="form-group">
  				<label>Thana<span class="text-danger">***</span></label>
  				<input type="text" class="form-control form-control-sm" name="thana" Value="{{$address->thana}}" maxlength="50" required>
  				@foreach ($errors->get('thana') as $error)
			    <small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> {{  $error }}</i></small>		  
			    @endforeach
			</div>
			<div class="form-group">
  				<label>District<span class="text-danger">***</span></label>
  				<input type="text" class="form-control form-control-sm" name="district" Value="{{$address->district}}" maxlength="11" required>
  				@foreach ($errors->get('district') as $error)
			    <small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> {{  $error }}</i></small>		  
			    @endforeach
			</div>
			<div class="form-group">
  				<label>Division<span class="text-danger">***</span></label>
  				<input type="text" class="form-control form-control-sm" name="division" Value="{{$address->division}}" maxlength="11" required>
  				@foreach ($errors->get('division') as $error)
			    <small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> {{  $error }}</i></small>		  
			    @endforeach
			</div>
			<div class="form-group">
  				<label>Country<span class="text-danger">***</span></label>
  				<input type="text" class="form-control form-control-sm" name="country" Value="Bangladesh" maxlength="11" readonly>
			</div>
			<div class="form-group">
  				<label>Post Code<span class="text-danger">***</span></label>
  				<input type="text" class="form-control form-control-sm" name="post_code" Value="{{$address->post_code}}" maxlength="5" required>
  				@foreach ($errors->get('post_code') as $error)
			    <small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> {{  $error }}</i></small>		  
			    @endforeach
			</div>
			<div class="form-group">
				<label>Default Address</label>
				@if($address->default_address != null)  				
  					&nbsp&nbsp<input type="radio" name="default_address" Value="Yes" checked required>Yes
  					&nbsp&nbsp&nbsp<input type="radio" name="default_address" Value="" required>No
  				@else
  					&nbsp&nbsp<input type="radio" name="default_address" Value="Yes" required>Yes
  					&nbsp&nbsp&nbsp<input type="radio" name="default_address" Value="" checked required>No
  				@endif
			</div>
  			<?php break; ?>
  			@endforeach  				
  		@elseif((session()->has('old1')))
  			<div class="form-group">
  				<label>Full Name<span class="text-danger">***</span></label>
  				<input type="text" class="form-control form-control-sm" name="name" Value="{{old('name')}}" maxlength="30" required>
  				@foreach ($errors->get('name') as $error)
			    <small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> {{  $error }}</i></small>		  
			    @endforeach
			</div>
			<div class="form-group">
  				<label>Company</label>
  				<input type="text" class="form-control form-control-sm" name="company" Value="{{old('company')}}" maxlength="50">
  				@foreach ($errors->get('company') as $error)
			    <small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> {{  $error }}</i></small>		  
			    @endforeach			    	
			</div>
			<div class="form-group">
  				<label>Address 1<span class="text-danger">***</span></label>
  				<input type="text" class="form-control form-control-sm" name="address_1" Value="{{old('address_1')}}" maxlength="50" required>
  				@foreach ($errors->get('address_1') as $error)
			    <small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> {{  $error }}</i></small>		  
			    @endforeach
			</div>
			<div class="form-group">
  				<label>Address 2</label>
  				<input type="text" class="form-control form-control-sm" name="address_2" Value="{{old('address_2')}}" maxlength="50">
  				@foreach ($errors->get('address_2') as $error)
			    <small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> {{  $error }}</i></small>		  
			    @endforeach
			</div>
			<div class="form-group">
  				<label>Thana<span class="text-danger">***</span></label>
  				<input type="text" class="form-control form-control-sm" name="thana" Value="{{old('thana')}}" maxlength="50" required>
  				@foreach ($errors->get('thana') as $error)
			    <small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> {{  $error }}</i></small>		  
			    @endforeach
			</div>
			<div class="form-group">
  				<label>District<span class="text-danger">***</span></label>
  				<input type="text" class="form-control form-control-sm" name="district" Value="{{old('district')}}" maxlength="11" required>
  				@foreach ($errors->get('district') as $error)
			    <small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> {{  $error }}</i></small>		  
			    @endforeach
			</div>
			<div class="form-group">
  				<label>Division<span class="text-danger">***</span></label>
  				<input type="text" class="form-control form-control-sm" name="division" Value="{{old('division')}}" maxlength="11" required>
  				@foreach ($errors->get('division') as $error)
			    <small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> {{  $error }}</i></small>		  
			    @endforeach
			</div>
			<div class="form-group">
  				<label>Country<span class="text-danger">***</span></label>
  				<input type="text" class="form-control form-control-sm" name="country" Value="Bangladesh" maxlength="11" readonly>
			</div>
			<div class="form-group">
  				<label>Post Code<span class="text-danger">***</span></label>
  				<input type="text" class="form-control form-control-sm" name="post_code" Value="{{old('post_code')}}" maxlength="5" required>
  				@foreach ($errors->get('post_code') as $error)
			    <small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> {{  $error }}</i></small>		  
			    @endforeach
			</div>
			<div class="form-group">
  				<label>Default Address</label>
  				@if(old('default_address') != null)  				
  					&nbsp&nbsp<input type="radio" name="default_address" Value="Yes" checked required>Yes
  					&nbsp&nbsp&nbsp<input type="radio" name="default_address" Value="" required>No
  				@else
  					&nbsp&nbsp<input type="radio" name="default_address" Value="Yes" required>Yes
  					&nbsp&nbsp&nbsp<input type="radio" name="default_address" Value="" checked required>No
  				@endif
			</div>			
  		@endif 
      <button type="submit" class="btn btn-primary">Save</button>
      @if($opt == "ab")
      <a href="/user/address-book" class="btn float-right btn-primary">Back</a>
      @elseif($opt == "check") 
      <a href="/user/cart/checkout" class="btn float-right btn-primary">Back</a>
      @elseif($opt == "ho") 
      <a href="/user/home" class="btn float-right btn-primary">Back</a>
      @endif				
  		</form>              
  	</div>		
@endsection

@section('script')
@endsection