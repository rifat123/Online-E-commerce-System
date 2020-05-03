@extends('layouts.main')

@section('title')
	<title>Product Comparison</title>
@endsection

@section('middle')
	<div class="container-fluid pb-1" style="background-color:floralwhite">		
		<h5 class="text-center">Product Comparison({{count($compareCollection)}})</h5>		
	</div>
	</br>
	<div class="container py-3" style="background-color:floralwhite">
		@if($data)
		<table class="table table-sm table-bordered table-hover table-block" style="font-size:14px">
			<tbody>
				<tr>
					<td>Product Name</td>
					@foreach($data as $dat)
					<td><a href="/component/{{$dat->Cat}}/{{$dat->Id}}" style="text-decoration:none">{{$dat->Title}}</a></td>					
					@endforeach
				</tr>
				<tr>
					<td>Image</td>
					@foreach($data as $dat)					
					<td class="text-center"><a href="/component/{{$dat->Cat}}/{{$dat->Id}}" style="text-decoration:none"><img src="{{$dat->Picture_1}}" class="border border-dark" alt="Foul" height="120" width="120"></a></td>					
					@endforeach
				</tr>
				@foreach($columns as $col)
					@if($col->Column_Name != "Id" && $col->Column_Name != "Title" && $col->Column_Name != "Picture_1" && $col->Column_Name != "Picture_2" && $col->Column_Name != "Picture_3" && $col->Column_Name != "Picture_4" && $col->Column_Name != "Picture_5" && $col->Column_Name != "Picture_6" && $col->Column_Name != "Deleted" && $col->Column_Name != "Quantity" && $col->Column_Name != "Warranty" && $col->Column_Name != "Price")
					<tr>
						<td>{{str_replace('_',' ',$col->Column_Name)}}</td>
						@foreach($data as $dat)
						<?php $c = $col->Column_Name; if(property_exists($dat, "$c")){$d = $dat->$c;} else{$d = "-";} ?>
						<td>{{$d}}</td>
						@endforeach
					</tr>
					@endif					
				@endforeach
				<tr>
					<td>Warranty</td>
					@foreach($data as $dat)
					<td>{{$dat->Warranty}}</td>					
					@endforeach
				</tr>
				<tr>
					<td>Price</td>
					@foreach($data as $dat)
					<td>TK {{number_format($dat->Price)}}</td>					
					@endforeach
				</tr>
				<tr>
					<td></td>
					@foreach($data as $dat)
					<td>
						<div class="mx-auto" style="width:130px">
							@if(session()->get('type') != 'admin')
							<button class="btn btn-primary btn-sm btn-block add_to_cart" pid="{{$dat->Cat.'&'.$dat->Id}}" title="{{$dat->Title}}" picture="{{$dat->Picture_1}}" price="{{$dat->Price}}" quantity=1>ADD TO CART</button>
							@endif
							<a href="/compare/remove/{{$dat->Cat}}/{{$dat->Id}}" class="btn btn-danger btn-sm text-white btn-block">Remove</i></a>
						<div>
					</td>					
					@endforeach
				</tr>
			</tbody>
		</table>
		@else
			<p class="text-center">No Products Selected</p>
		@endif
	</div>
	</br></br></br>
@endsection

@section('script')
	<script>
		$(document).ready(function(){

			$('.add_to_cart').click(function(){
				var pid = $(this).attr('pid');
				var title = $(this).attr('title');
				var price = $(this).attr('price');
				var quantity = $(this).attr('quantity');
				var picture = $(this).attr('picture');
				
				$.ajax({
					url: "/cart/add",
					method: "post",
					data: {pid:pid, title:title, price:price, quantity:quantity, picture:picture},
					success: function(data){
						location.reload();
					}
				});
			});

		});
	</script>
@endsection