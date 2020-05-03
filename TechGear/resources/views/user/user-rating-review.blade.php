@extends('layouts.user-main')

@section('title')
	<title>My Reviews</title>
	<link href="/css/star-rating.css" rel="stylesheet">
@endsection

@section('main')
	<h4 class="text-center text-info">My Reviews</h4>
	</br>
	@if(count($orders) > 0)
	@foreach($orders as $order)
	<div class="container pb-1" style="background-color:ghostwhite">	
		<div class="row">
			<div class="col-7">
				<span style="font-size:17px">Order <span class="text-info">#{{$order->id}}</span></span></br>
			</div>			
		</div>
		<hr class="mt-1 mb-2 row">		
		
		@foreach($productList as $pl)
		@if($order->id == $pl->oid)
		<div class="row">	    		
	    	<div class="col-1">
	     		<a href="/component/{{$pl->table_name}}/{{$pl->pid}}"><img src="{{$pl->picture}}" class='border border-dark' alt='Image Unavailable' height=50 width=50></a>
	    	</div>
	      	<div class="col-5 pl-1">
	     		<a href="/component/{{$pl->table_name}}/{{$pl->pid}}" style="text-decoration:none;font-weight:">{{$pl->title}}</a>
	    	</div>	    	
	    	<div class="col-6">
	    		@if($pl->customer_rating != null)
	    		<div class="row">
	    			<div class="col-3 px-0 ">
	    				@for($i=0; $i<$pl->customer_rating; $i++)	    				
	    			 	<i class="fas fa-star text-danger"></i>   		
	    			 	@endfor
	    			 	@for($i=0; $i<(5-$pl->customer_rating); $i++)	    				
	    			 	<i class="far fa-star"></i>   		
	    			 	@endfor    		
	    			</div>
	    			<div class="col-9 pr-1">
	    				{{$pl->customer_comment}}
	    			</div>
	    		</div>
	     		@else
	      		<div class="mx-auto" style="width:188px">
	     			<button class="btn btn-sm btn-warning btn-rr"  op_id="{{$pl->id}}" data-toggle="modal" data-target="#myModal">Please Review This Product</button>
	    		</div>
	     		@endif
	    	</div>	    		
	    </div>
	    <hr class="mt-1 mb-2 row">
	    @endif
	    @endforeach		
	</div>
	</br></br>
	@endforeach
	@endif

	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    	<div class="modal-dialog" role="document">
        	<div class="modal-content">
          		<div class="modal-header">
          			<h4 class="modal-title" id="myModalLabel">Rating & Review</h4>
            		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
            			<span aria-hidden="true">&times;</span>
            		</button>
          		</div>
          		<div class="modal-body">
          			<form method="POST">
          				<div class="rating">
							<label>
          						<input type="radio" name="stars" value="1" required />
          						<span class="icon">★</span>
							</label>
							<label>
          						<input type="radio" name="stars" value="2" required />
          						<span class="icon">★</span>
          						<span class="icon">★</span>
							</label>
							<label>
          						<input type="radio" name="stars" value="3" required />
          						<span class="icon">★</span>
          						<span class="icon">★</span>
          						<span class="icon">★</span>   
							</label>
							<label>
          						<input type="radio" name="stars" value="4" required />
          						<span class="icon">★</span>
          						<span class="icon">★</span>
          						<span class="icon">★</span>
          						<span class="icon">★</span>
							</label>
							<label>
          						<input type="radio" name="stars" value="5" required />
          						<span class="icon">★</span>
          						<span class="icon">★</span>
          						<span class="icon">★</span>
          						<span class="icon">★</span>
          						<span class="icon">★</span>
							</label>
          				</div>
          		    	<textarea class="form-control mt-2" name="comment" placeholder="Write Your Comment" minlength="5" maxlength="150"></textarea>
          		    	<small class="form-text text-danger font-weight-bold font-italic">Note: Once You Submit, You can't change your dicision in future.</small>
          		    	<input type="hidden" name="op_id" id="op_id">         	
          		    	<hr class="row">
          		    	<button class="btn btn-secondary float-right" data-dismiss="modal">Close</button>
          		    	<button type="submit" class="btn btn-primary float-">Submit</button>
          		    </form>
          		</div>      
        	</div>
      	</div>
    </div>
@endsection

@section('script')
	<script>
		$(document).ready(function(){

			$('.btn-rr').click(function(){
				var op_id = $(this).attr('op_id');
				$('#op_id').val(op_id);			
			});

			$('#myModal').on('hidden.bs.modal', function (e) {
            	console.log("Modal hidden");
            	$(this).find('form').trigger('reset');
			});
		});
	</script>	
@endsection