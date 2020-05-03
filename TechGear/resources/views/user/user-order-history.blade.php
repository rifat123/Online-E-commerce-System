@extends('layouts.user-main')

@section('title')
	<title>My Order History</title>
@endsection

@section('main')
	<h4 class="text-center text-info">My Orders</h4>
	</br>
	@if(count($orders) > 0)
	@foreach($orders as $order)
	<div class="container" style="background-color:beige">	
		<div class="row">
			<div class="col-7">
				<span style="font-size:17px">Order <span class="text-info">#{{$order->id}}</span></span></br>
				<small class="text-muted">Placed on {{$order->created}}</small>
			</div>
			<div class="col-3 pt-2">
				<span style="font-size:20px"><span class="text-muted">Subtotal:</span> TK {{ number_format($order->subtotal)}}</span>
			</div>
			<div class="col-2">
				<h4 class="mt-2 float-right"><span class="badge badge-info">{{$order->status}}</span></h4>
			</div>			
		</div>
		<hr class="mt-1 mb-2 row">		
		<table class="table table-borderless table-sm mb-1">
			<tbody>
				@foreach($productList as $pl)
				@if($order->id == $pl->oid)
	    		<tr>
	      			<td>
	      				<a href="/component/{{$pl->table_name}}/{{$pl->pid}}"><img src="{{$pl->picture}}" class='border border-dark' alt='Image Unavailable' height=50 width=50></a>
	      			</td>
	      			<td>
	      				<a href="/component/{{$pl->table_name}}/{{$pl->pid}}" style="text-decoration:none;font-weight:">{{$pl->title}}</a>
	      			</td>
	      			<td>
	      				<span class="text-muted">Qty:</span> {{$pl->quantity}}</span>
	      			</td>
	      			<td>
	      				<span class="text-muted">Unit Price:</span> TK {{number_format($pl->price)}}</span>
	      			</td>
	      			<td>
	      				<span class="text-muted">Total:</span> TK {{number_format($pl->price*$pl->quantity)}}</span>
	      			</td>
	    		</tr>
	    		@endif
	    		@endforeach
			</tbody>
		</table>
		<hr class="my-0 row">
		<div class="ml-1 pb-2">
			<span style="font-size:13px"><b>Payment Method:</b> {{$order->payment_method}}</span></br>
			@foreach($address as $ad)
			@if($order->aid == $ad->id)
			<span style="font-size:13px"><b>Shipped To:</b> {{$ad->name}} | {{$ad->phone}}, {{$ad->company}}, {{$ad->address_1}}, {{$ad->thana}}, {{$ad->district}}, {{$ad->division}}, {{$ad->post_code}}, {{$ad->country}}</span>
	    	@endif
	    	@endforeach			
		</div>
	</div>
	</br></br>
	@endforeach
	@endif
@endsection

@section('script')
@endsection