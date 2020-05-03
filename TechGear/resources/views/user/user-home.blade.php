@extends('layouts.user-main')

@section('title')
	<title>My Home</title>
@endsection

@section('main')
	<h4 class="text-white text-center bg-secondary pb-2 rounded">Manage My Account</h4>
	<div class="row mx-0 mt-3">		
		<div class="card text-white bg-secondary mb-3 mr-4" style="width:20rem;">
  			<div class="card-header h5">Personal Informations | <a href="/user/edit-account" class="text-warning" style="text-decoration:none">EDIT</a></div>
  			<div class="card-body pb-0">
  				@foreach($account as $acc)
    			<h6 class="card-title text-warning">{{$acc->name}}</h6>
    			<h6 class="card-title text-warning">{{$acc->email}}</h6>
    			<h6 class="card-title text-warning">{{$acc->phone}}</h6>
    			<h6 class="card-title text-warning">{{$acc->fax}}</h6>
    			@endforeach   		
  			</div>
		</div>

		<div class="card text-white bg-secondary mb-3" style="width:36rem;">
			@if($address)
			@foreach($address as $ua)
  			<div class="card-header h5">Address Informations | <a href="/user/address-book/ho/{{$ua->id}}" class="text-warning" style="text-decoration:none">EDIT</a></div>
  			<div class="card-body pb-0">  				
    			<h6 class="card-title text-white">DEFAULT SHIPPING ADDRESS</h6>
    			<h6 class="card-title text-warning">{{$ua->name}}</h6>    				
    			<h6 class="card-title text-warning">
    				<?php 	      				
	      				if($ua->company != null) {echo"$ua->phone, ";}
	      				if($ua->company != null) {echo"$ua->company, ";}
	      				if($ua->address_1 != null) {echo"$ua->address_1, ";}
	      				if($ua->address_2 != null) {echo"$ua->address_2, ";}
	      				if($ua->thana != null) {echo"$ua->thana, ";}
	      				if($ua->district != null) {echo"$ua->district, ";}
	      				if($ua->division != null) {echo"$ua->division, ";}
	      				if($ua->post_code != null) {echo"$ua->post_code";}
	      			?>
    			</h6>   			   		
  			</div>
  			@endforeach
  			@else
  			<div class="card-header h5">Address Informations</div>
  			<div class="card-body pb-0  text-center">  				
  				<a class="btn btn-success" href="/user/add-address/ho">ADD ADDRESS</a>
  			</div>
  			@endif
		</div>	

		<div class="card text-white bg-secondary mb-3" style="width:58rem;">
  			<div class="card-header h5">Recent Orders</div>
  			<div class="card-body pb-0 pt-1 px-2">
  				@if($orders)
  				<table class="table table-borderless">
  					<tbody>
  						<tr class="font-weight-bold">
  							<td>Order #</td>
  							<td>Placed On</td>
  							<td>Status</td>
  							<td>Items</td>
  							<td>Subtotal</td>
  							<td>Action</td>
  						</tr>
  						@foreach($orders as $order)
  						<tr class="text-warning">
  							<td># {{$order->id}}</td>
  							<td>{{$order->created}}</td>
  							<td>{{$order->status}}</td>
  							<td>{{$order->items}}</td>
  							<td>TK {{number_format($order->subtotal)}}</td>
  							<td><a href="/user/order-history" style="text-decoration:none;color:black">View Details</a></td>
  						</tr>
  						@endforeach
  					</tbody>  					
  				</table>
  				@else
  				<h6 class="text-center text-warning">No Order Has Been Created Yet</h6>
  				@endif  		
  			</div>
		</div>	
	</div>
	</br></br></br>	
@endsection