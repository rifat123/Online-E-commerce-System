@extends('layouts.main')

@section('title')
	<title>Checkout</title>
@endsection

@section('middle')
	</br>
	<div class="container">
		<form method="POST">
	<div class="row border">
		<div class="col-5">
			<h5 class="text-center text-dark">Shipping Address</h5></br>
			@if(count($address) == 1)
			@foreach($address as $ua)
			<?php 
	      		if($ua->name != null) {echo"$ua->name</br>";}    
	      		if($ua->company != null) {echo"$ua->company</br>";}
	      		if($ua->address_1 != null) {echo"$ua->address_1</br>";}
	      		if($ua->address_2 != null) {echo"$ua->address_2</br>";}
	      		if($ua->thana != null) {echo"$ua->thana</br>";}
	      		if($ua->district != null) {echo"$ua->district</br>";}
	      		if($ua->division != null) {echo"$ua->division</br>";}
	      		if($ua->post_code != null) {echo"$ua->post_code";}
	      	?>	      	
	      	<div class="clearfix mt-2 mb-3">	      		
	      		<a href="/user/address-book/check/{{$ua->id}}" class="btn btn-info float-left btn-sm text-white">Edit This Address</a>
	      		<a href="/user/add-address/check" class="btn btn-info float-right btn-sm text-white">Add New Address</a>	      		
	      	</div>
	      	<input type="hidden" name="address" value="{{$ua->id}}">
	      	@endforeach
	      	@endif
	      	@if(count($address) == 0)
	      	<a href="/user/add-address/check" class="btn btn-info btn-sm text-white" >Add New Address</a>
	      	<input type="hidden" name="address">
	      		@foreach ($errors->get('address') as $error)
	      			<small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> {{  $error }}</i></small>		  
	      		@endforeach
	      	@endif
		</div>
		<div class="col-7 border-left pr-5">
			<h5 class="text-center">Payment Methods</h5></br>
			<input type="radio" name="payment_method" value="Cash On Delivery" required>  Cash On Delivery</br>			
			<input type="radio" name="payment_method" value="Card/Mobile Banking/Internet Banking" required>  Card/Mobile Banking/Internet Banking</br></br>
			
			<!-- <div class="input-group">
						  <h1><a href="javascript:void(0)" class="payment_method" name="cash"><img src="/images/payment/cash.jpg" alt="foul"></a></h1>
				&nbsp&nbsp<h1><a href="javascript:void(0)" class="payment_method" name="visa"><img src="/images/payment/visa.png" alt="foul"></h1>
				&nbsp&nbsp<h1><a href="javascript:void(0)" class="payment_method" name="master"><img src="/images/payment/master.jpg" alt="foul"></a></h1>		
				&nbsp&nbsp<h1><a href="javascript:void(0)" class="payment_method" name="nexus"><img src="/images/payment/nexus.png" alt="foul"></a></h1>		
				&nbsp&nbsp<h1><a href="javascript:void(0)" class="payment_method" name="rocket"><img src="/images/payment/rocket.jpg" alt="foul"></a></h1>
				&nbsp&nbsp<h1><a href="javascript:void(0)" class="payment_method" name="bkash"><img src="/images/payment/bkash.png" alt="foul"></a></h1>
			</div>
			<div class="mb-2 text-danger font-weight-bold" id="method_name">VISA Selected</div>			
			<div id="cash_div" class="alert alert-info col-9" style="display:none">
				Cash Will Be Taken When You Will Receive Your Products
			</div>
			<div id="card_div" style="display:none">
				<div class="row">
					<div class="col-6">
						<input type="text" class="form-control form-control-sm" placeholder="Card Holder's Name">			
					</div>
					<div class="col-6">
						<input type="text" class="form-control form-control-sm" placeholder="Card Number">				  	
					</div>
				</div>
				</br>
				<div class="row ">
					<div class="col-6">
						<input type="text" class="form-control form-control-sm" placeholder="Security Code">			
					</div>
					<div class="col-2">
						<select class="form-control form-control-sm">
							<option>01</option>
							<option>02</option>
							<option>03</option>
							<option>04</option>
							<option>05</option>
							<option>06</option>
							<option>07</option>
							<option>08</option>
							<option>09</option>
							<option>10</option>
							<option>11</option>
							<option>12</option>
						</select>				  	
					</div>
					<div class="col-3">
						<select class="form-control form-control-sm">
							<option>2019</option>
							<option>2020</option>
							<option>2021</option>
							<option>2022</option>
							<option>2023</option>
							<option>2024</option>
							<option>2025</option>
							<option>2026</option>
							<option>2027</option>
							<option>2028</option>
							<option>2029</option>
							<option>2030</option>
						</select>				  	
					</div>
				</div>				
			</div>
			<div id="bkash_div" style="display:none">
				Use 01765422779 as Merchant Number, when you make bKash payment.</br>
				Must use 105098812 as Reference, when you make bKash payment.</br>				
				After a successfull payment, must type Your bKash number below.
				<input type="text" class="col-6 form-control form-control-sm mt-2" placeholder="Your bKash Number">
			</div>
			<div id="rocket_div" style="display:none">
				Use 017654227798 as Merchant Number, when you make Rocket payment.</br>
				Must use 105098812 as Reference, when you make Rocket payment.</br>				
				After a successfull payment, must type Your 12-Digits Rocket number below.
				<input type="text" class="col-6 form-control form-control-sm mt-2" placeholder="Your 12-Digits Rocket Number">
			</div> -->
		</div>
	</div>
	</br>
	<div class="row border">
		<div class="col-4 py-2 border-right">
			<h6>TOTAL AMOUNT</h6>
			<small>Sub Total<span class="float-right text-info font-weight-bold total">TK {{$subTotal}}</span></small></br>
			<small>Discount(0%)<span class="float-right text-info font-weight-bold">TK 0</span></small>
			<hr class="my-0 bg-success">
			<small>Grand Total<span class="float-right text-info font-weight-bold total">TK {{$subTotal}}</span></small>
		</div>
		<div class="col-8 align-self-center">
			<div class="row ">
				<div class="col-6 input-group">
					<input type="text" class="form-control" placeholder="Gift Voucher" disabled>
			  		<div class="input-group-append">
			    		<button class="btn btn-outline-secondary" disabled>Apply Voucher</button>
			  		</div>
				</div>
				<div class="col-6 input-group">
					<input type="text" class="form-control" placeholder="Promo Code" disabled>
			  		<div class="input-group-append">
			    		<button class="btn btn-outline-secondary" disabled>Apply Promo</button>
			  		</div>
				</div>
			</div>
		</div>
	</div>
	<button class="btn btn-success row mt-2 float-right">Confirm Order</button></br></br></br></br></br></br></br>
		</form>
	</div>
	
@endsection

@section('script')	
@endsection