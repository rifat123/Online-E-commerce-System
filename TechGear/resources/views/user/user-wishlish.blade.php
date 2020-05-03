@extends('layouts.user-main')

@section('title')
	<title>My Wishlist</title>
@endsection

@section('main')
	<h5 class="text-center text-info">My Wish List({{$wishlistCount}})</h5>
	</br>
	@if($wishlistCount > 0)
	<table class="table table-bordered">
		<thead>
			<tr>
				<th scope="col">Image</th>
				<th scope="col">Product Name</th>
				<th scope="col">Model</th>
				<th scope="col">Unit Price</th>
				<th scope="col">Action</th>
			</tr>			  
		</thead>
		<tbody>
			@foreach($wishlist as $wl)
	    	<tr style="font-size:13.5px">
	      		<td>
	      			<a href="/component/{{$wl->table}}/{{$wl->pid}}"><img src="{{$wl->picture}}" class='border border-dark' alt='foul' height=50 width=50></a>
	      		</td>
	      		<td>
	      			<a href="/component/{{$wl->table}}/{{$wl->pid}}" style="text-decoration:none;font-weight:">{{$wl->title}}</a>
	      		</td>
	      		<td>
	      			<p>{{$wl->model}}</p>
	      		</td>
	      		<td>
	      			<p>TK {{$wl->price}}</p>
	      		</td>
	      		<td style="white-space: nowrap">
	      			<a href="/user/wishlist-to-cart/{{$wl->id}}/{{$wl->table}}/{{$wl->pid}}" class="btn btn-info mr-2"><i class="fas fa-cart-plus"></i></a>
	      			<a href="/user/delete-from-wishlist/{{$wl->id}}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
	      		</td>
	    	</tr>
	    	@endforeach
		</tbody>
	</table>
	@endif
@endsection

@section('script')

@endsection