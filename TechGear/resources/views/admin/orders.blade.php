@extends('layouts.admin-main')

@section('title')
	<title>Product Orders</title>
@endsection

@section('middle')
	<div class="container">
		<div class="row mt-2 mb-3">
			<div class="col-12  px-0">
		    	<h5 class="text-center">{{$opt}} Orders<a href="/admin/home" class="float-right btn btn-danger btn-sm"><i class="fas fa-backward"> Back</i></a></h5>
		  	</div>          
		</div>				
	</div>
	<div class="container px-0">		
		<div class="col-5 px-0">
			<ul class="nav nav-tabs">
		  		<li class="nav-item">
		    		<a class="nav-link active" href="/admin/orders/active">Active Orders &nbsp</a>
		  		</li>
		  		<li class="nav-item">
		    		<a class="nav-link active" href="/admin/orders/completed">Completed Orders</a>
		  		</li>
		  		<li class="nav-item">
		    		<a class="nav-link active" href="/admin/orders/cancelled">Cancelled Orders</a>
		  		</li>
			</ul>
		</div>	
	</div>
			
	@if($opt == "Active")
	<div class="container px-1 bg-secondary">
		@if($activeOrders)
		<table class="table table-sm table-hover table-borderless">
			<tbody>
				<tr class="font-weight-bold text-white">
					<td>Order Id</td>
					<td>Placed On</td>
					<td>Customer</td>
					<td>Status</td>
					<td>Subtotal</td>
					<td>Action</td>
				</tr>
				@foreach($activeOrders as $order)
				<tr class="text-warning">
					<td># {{$order->id}}</td>
					<td>{{$order->created}}</td>
					<td>{{$order->customer_name}}</td>
					<td>
						<form method="POST">
							<select class="custom-select" name="selected_status" style="max-width:130px">
								@if($order->status == "Pending")
								<option value="Pending" selected>Pending</option>
								@else
								<option value="Pending">Pending</option>
								@endif
								@if($order->status == "Packing")
								<option value="Packing" selected>Packing</option>
								@else
								<option value="Packing">Packing</option>
								@endif
								@if($order->status == "Shipped")
								<option value="Shipped" selected>Shipped</option>
								@else
								<option value="Shipped">Shipped</option>
								@endif
								@if($order->status == "Delivered")
								<option value="Delivered" selected>Delivered</option>
								@else
								<option value="Delivered">Delivered</option>
								@endif							
								<option value="Completed">Completed</option>
								<option value="Cancelled">Cancelled</option>							
							</select>						
							<input type="hidden" name="order_id" value="{{$order->id}}">
							<button class="btn btn-sm btn-warning">Submit</button>
						</form>												
					</td>
					<td>TK {{number_format($order->subtotal)}}</td>
					<td>						
						<a href="/admin/orders/{{$order->id}}" class="btn btn-sm btn-success" style="text-decoration:none;color:black">View Details</a>
					</td>
				</tr>
				@endforeach
			</tbody>  					
		</table>
		@else
		<h5 class="text-center text-white py-2">No Active Order Found</h5>
		@endif  		
	@endif

	@if($opt == "Completed")
	<div class="container px-1 bg-secondary">
		@if($completedOrders)
		<table class="table table-sm table-hover table-borderless">
			<tbody>
				<tr class="font-weight-bold text-white">
					<td>Order Id</td>
					<td>Placed On</td>
					<td>Customer</td>
					<td>Status</td>
					<td>Subtotal</td>
					<td>Action</td>
				</tr>
				@foreach($completedOrders as $order)
				<tr class="text-warning">
					<td># {{$order->id}}</td>
					<td>{{$order->created}}</td>
					<td>{{$order->customer_name}}</td>
					<td>
						<form method="POST">
							<select class="custom-select" name="selected_status" style="max-width:130px">	
								<option value="Pending">Pending</option>						
								<option value="Packing">Packing</option>
								<option value="Shipped">Shipped</option>
								<option value="Delivered">Delivered</option>
								<option value="Completed" selected>Completed</option>
								<option value="Cancelled">Cancelled</option>							
							</select>						
							<input type="hidden" name="order_id" value="{{$order->id}}">
							<button class="btn btn-sm btn-warning">Submit</button>
						</form>												
					</td>
					<td>TK {{number_format($order->subtotal)}}</td>
					<td>						
						<a href="/admin/orders/{{$order->id}}" class="btn btn-sm btn-success" style="text-decoration:none;color:black">View Details</a>
					</td>
				</tr>
				@endforeach
			</tbody>  					
		</table>
		@else
		<h5 class="text-center text-white py-2">No Completed Order Found</h5>
		@endif  		
	@endif

	@if($opt == "Cancelled")
	<div class="container px-1 bg-secondary">
		@if($cancelledOrders)
		<table class="table table-sm table-hover table-borderless">
			<tbody>
				<tr class="font-weight-bold text-white">
					<td>Order Id</td>
					<td>Placed On</td>
					<td>Customer</td>
					<td>Status</td>
					<td>Subtotal</td>
					<td>Action</td>
				</tr>
				@foreach($cancelledOrders as $order)
				<tr class="text-warning">
					<td># {{$order->id}}</td>
					<td>{{$order->created}}</td>
					<td>{{$order->customer_name}}</td>
					<td>
						<form method="POST">
							<select class="custom-select" name="selected_status" style="max-width:130px">	
								<option value="Pending">Pending</option>						
								<option value="Packing">Packing</option>
								<option value="Shipped">Shipped</option>
								<option value="Delivered">Delivered</option>
								<option value="Completed">Complleted</option>
								<option value="Cancelled" selected>Cancelled</option>							
							</select>						
							<input type="hidden" name="order_id" value="{{$order->id}}">
							<button class="btn btn-sm btn-warning">Submit</button>
						</form>												
					</td>
					<td>TK {{number_format($order->subtotal)}}</td>
					<td>						
						<a href="/admin/orders/{{$order->id}}" class="btn btn-sm btn-success" style="text-decoration:none;color:black">View Details</a>
					</td>
				</tr>
				@endforeach
			</tbody>  					
		</table>
		@else
		<h5 class="text-center text-white py-2">No Cancelled Order Found</h5>
		@endif  		
	@endif

	@if($opt == "Order Details")
	<div class="container px-1 pb-1">
		@foreach($order as $or)
		</br>
		<table class="table table-bordered table-hover">
			<thead class="font-weight-bold">
				<tr>
					<td colspan="2">Order Basics</td>
				</tr>
			</thead>
			<tbody>				
				<tr>
					<td>Order ID: #{{$or->id}} </br> Placed On:  {{$or->created}}</td>
					<td>Payment Method: {{$or->payment_method}} </br> Shipping Method: None</td>
				</tr> 	
			</tbody> 					
		</table>
		</br>
		<table class="table table-bordered table-hover">
			<thead>
				<tr class="font-weight-bold">
					<td>Shipping Address</td>
				</tr>
			</thead>
			<tbody>
				@foreach($address as $ua)				
				<tr>
					<td>
					<?php 	      				
	      				if($ua->name != null) {echo"$ua->name</br>";}
	      				if($ua->company != null) {echo"$ua->phone</br>";}
	      				if($ua->company != null) {echo"$ua->company</br>";}
	      				if($ua->address_1 != null) {echo"$ua->address_1</br>";}
	      				if($ua->address_2 != null) {echo"$ua->address_2</br>";}
	      				if($ua->thana != null) {echo"$ua->thana</br>";}
	      				if($ua->district != null) {echo"$ua->district</br>";}
	      				if($ua->division != null) {echo"$ua->division</br>";}
	      				if($ua->post_code != null) {echo"$ua->post_code";}
	      			?>	      		
					</td>										
				</tr>
				@endforeach				 	
			</tbody> 					
		</table>		
		</br>
		<table class="table table-bordered table-hover">
			<thead class="font-weight-bold">
				<tr>
					<td>Image</td>
					<td>Product Name</td>
					<td>Quantity</td>
					<td>Unit Price</td>
					<td>Total</td>
				</tr>
			</thead>
			<tbody>
				@foreach($productList as $pl)
	    		<tr>
	      			<td>
	      				<a href="/component/{{$pl->table_name}}/{{$pl->pid}}"><img src="{{$pl->picture}}" class='border border-dark' alt='Image Unavailable' height=50 width=50></a>
	      			</td>
	      			<td>
	      				<a href="/component/{{$pl->table_name}}/{{$pl->pid}}" style="text-decoration:none;font-weight:">{{$pl->title}}</a>
	      			</td>
	      			<td>
	      				<span class="text-muted"></span> {{$pl->quantity}}</span>
	      			</td>
	      			<td>
	      				<span class="text-muted"></span> TK {{number_format($pl->price)}}</span>
	      			</td>
	      			<td>
	      				<span class="text-muted"></span> TK {{number_format($pl->price*$pl->quantity)}}</span>
	      			</td>
	    		</tr>	    		
	    		@endforeach
	    		<tr>
	    			<td colspan="4" class="font-weight-bold"><span class="float-right">Subtotal<span></td>
	    			<td class="font-weight-bold">TK {{number_format($or->subtotal)}}</td>
	    		</tr>
			</tbody>
		</table>
		@endforeach	
	@endif
	</div> 
@endsection