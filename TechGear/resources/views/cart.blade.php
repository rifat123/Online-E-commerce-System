@extends('layouts.main')

@section('title')
	<title>Cart</title>
@endsection

@section('middle')
	<div class="container py-3">
		<div class="row">
			<div class="col-4 offset-4">
				<h3 class="text-center">Shopping Basket</h3>			
			</div>
			<div class="col-4">
				<h4><span class="badge badge-warning float-right"><i class="fas fa-shopping-cart"> CART({{count($cartCollection)}})</i></span></h4>
			</div>
		</div>
	</div>
	<hr class="mt-0">

	@if(count($cartCollection) !=0)
	<div class="container">
		<div class="row">
			<div class="col-8 pl-0 align-self-start">
				@foreach($cartCollection as $ca)
				<div class='row ml-1'>
				    <div class="col-1 pt-0 pl-0">
				    	<?php $new = explode("&", $ca['id']); $link = "/component/$new[0]/$new[1]"?>
				        <a href="{{$link}}"><img src="{{$ca['attributes']['picture']}}" class='border border-dark' alt='foul' height=62 width=62></a>
				    </div>
				    <div class='ml-2' style='width:430px;font-size:14px;'>
				       <a href="{{$link}}" style="color:black;text-decoration:none;font-weight:">{{$ca['name']}}</a>
				    </div>
				    <div style="width:70px">
				        <small><span class="badge py-0 px-0">QTY: <input type="number" class="update" pid="{{$ca['id']}}" value="{{$ca['quantity']}}" price="{{$ca['price']}}" style="width:45px" min="1"></span></small > 
				      	<a href="{{'/cart/remove/'.$ca['id']}}" class="btn btn-danger btn-block badge mt-2 text-white">Remove</a>
				    </div>
				    <div class="ml-2 pl-1" style="width:170px">
				        <small>Unit Price: <span class="text-info font-italic">TK {{number_format($ca['price'])}}</span></small></br>
				        <small>Total Price: <span class="text-info font-italic" id="{{str_replace('&','_',$ca['id'])}}">TK {{number_format($ca['price']*$ca['quantity'])}}</span></small>
				    </div>				    
				</div>
				<hr>
				@endforeach
			</div>
			<div class="col-3 offset-1 align-self-start ">
				<h6>TOTAL AMOUNT</h6>
				<small>Sub Total<span class="float-right text-info font-weight-bold total">TK {{$subTotal}}</span></small></br>
				<small>Tax(0%)<span class="float-right text-info font-weight-bold">TK 0</span></small>
				<hr class="my-0">
				<small>Grand Total<span class="float-right text-info font-weight-bold total">TK {{$subTotal}}</span></small>
				@if(session()->get('type') == "user")
				<a href="user/cart/checkout" class="btn btn-dark btn-sm btn-block mt-3">Checkout</a>
				@elseif(session()->get('type') != "admin")
				<a href="/login" class="btn btn-dark btn-sm btn-block mt-3">Checkout</a>
				@endif
			</div>
		</div>
	</div>
	@endif
	</br></br>
@endsection

@section('script')
	<script>
		$(document).ready(function(){

			$('.update').on('change keyup', function(){
				var pid = $(this).attr("pid");
				var price = $(this).attr("price");
				var quantity = $(this).val();
				//console.log(pid);
				//console.log(quantity);
				$.ajax({
					url: "/cart/update",
					method: "post",
					data: {pid:pid, quantity:quantity},
					success: function(data){						
						//console.log(data);
						var newt = "TK "+(price*data[0]);
						var total = "TK "+(data[1]);
						pid = pid.replace("&","_");
						$('#'+pid).text(newt);
						$('.total').text(total);
					}
				});
			});


		});
	</script>
@endsection