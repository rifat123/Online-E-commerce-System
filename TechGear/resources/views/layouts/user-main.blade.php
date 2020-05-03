@extends('layouts.main')

@section('title')
	@yield('title')
@endsection

@section('middle')
	<div class="container mt-4">
		<div class="row">
			<div class="col-2 align-self-start px-0">
				<div class="list-group font-weight-bold">
					<a href="/user/home" class="list-group-item list-group-item-action">My Home</a>
					<a href="/user/edit-account" class="list-group-item list-group-item-action">Edit Account</a>
					<a href="/user/password" class="list-group-item list-group-item-action">Password</a>
					<a href="/user/address-book" class="list-group-item list-group-item-action">My Address Book</a>
					<a href="/user/wishlist" class="list-group-item list-group-item-action">My Wishlist</a>				
					<a href="/user/order-history" class="list-group-item list-group-item-action">My Order History</a>
					<a href="/user/my-question" class="list-group-item list-group-item-action">My Question</a>			  
					<a href="/user/rating-review" class="list-group-item list-group-item-action">My Reviews</a>			 
				 </div>								
			</div>
			<div class="col-10 align-self-start">
				@yield('main')
			</div>
		</div>
	</div>
@endsection

@section('script')
	@yield('script')
@endsection