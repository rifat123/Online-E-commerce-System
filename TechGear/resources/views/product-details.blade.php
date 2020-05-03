@extends('layouts.main')

@section('title')
	<title>Product Details</title>
@endsection

@section('middle')	
	<section>
		<div class="container mt-2">
			<div class="row mt-4">
				<div class="col-4 px-0 py-0">
					<div class="px-3 py-3 border">
						@foreach($details as $d)
						<img src="{{$d->Picture_1}}" class="img-fluid" id="main_image" height=350 width=350 alt="No Image Found">					    
						@endforeach
					</div>
					<div class="mt-4">
						@foreach($details as $d)
						@if($d->Picture_1 != null)
						<a href="javascript:void(0)" path="{{$d->Picture_1}}" class="sub_image"><img src="{{$d->Picture_1}}" class="img-fluid ml-2 border" height=50 width=50 alt="No Image Found"></a>						
						@endif
						@if($d->Picture_2 != null)
						<a href="javascript:void(0)" path="{{$d->Picture_2}}" class="sub_image"><img src="{{$d->Picture_2}}" class="img-fluid ml-2 border" height=50 width=50 alt="No Image Found"></a>						
						@endif
						@if($d->Picture_3 != null)
						<a href="javascript:void(0)" path="{{$d->Picture_3}}" class="sub_image"><img src="{{$d->Picture_3}}" class="img-fluid ml-2 border" height=50 width=50 alt="No Image Found"></a>						
						@endif
						@if($d->Picture_4 != null)
						<a href="javascript:void(0)" path="{{$d->Picture_4}}" class="sub_image"><img src="{{$d->Picture_4}}" class="img-fluid ml-2 border" height=50 width=50 alt="No Image Found"></a>						
						@endif
						@if($d->Picture_5 != null)
						<a href="javascript:void(0)" path="{{$d->Picture_5}}" class="sub_image"><img src="{{$d->Picture_5}}" class="img-fluid ml-2 border" height=50 width=50 alt="No Image Found"></a>						
						@endif
						@endforeach
					</div>									
				</div>				

				<div class="col-7 offset-1">							
					@foreach($details as $p)
					<h4 class="font-weight-bold">{{$p->Title}}</h4></br>
					<h4>Price: <span style="color:brown">TK {{number_format($p->Price)}}</span></h4>
					</br>
					<h5>Highlites</h5>
					Model: {{$p->Model}}</br>
					Warranty: {{$p->Warranty}}					
					<div class="mt-4 d-flex ">
						@if(Session::get('type') != "admin")					
						<button class="btn btn-primary btn-sm ml-2 add_to_cart"  pid="{{$table.'&'.$p->Id}}" title="{{$p->Title}}" picture="{{$p->Picture_1}}" price="{{$p->Price}}" quantity=1><i class="fas fa-cart-plus"></i> ADD TO CART</button>
						@if(Session::get('type') == "user")							
						<a href="/user/add-to-wishlist/{{$table}}/{{$p->Id}}" class="btn btn-outline-secondary btn-sm ml-2"><i class="far fa-heart"></i> Add to Wishlist</a>
						@else
						<a href="/login" class="btn btn-outline-secondary btn-sm ml-2"><i class="far fa-heart"></i> Add to Wishlist</a>
						@endif
						@endif					
						<a href="/compare/add/{{$table}}/{{$p->Id}}" class="btn btn-outline-secondary btn-sm ml-2"><i class="fas fa-exchange-alt"></i> Add to Compare</a>							
					</div>
					@endforeach
				</div>				
			</div>
		</div>
	</section>
	<hr class="mb-4">
	<section>
		<div class="container pl-0">	
			<div class="col-12 pt-2 pb-1 bg-dark">
				<h5 class="text-white">SPECIFICATIONS</h5>
			</div>		
			 
			@foreach($details as $p)
			<table class="table table-sm table-bordered">
				@foreach($column as $c)
				<tr>
					@if($p->$c != null && $c != 'Picture_1' && $c != 'Picture_2' && $c != 'Picture_3' && $c != 'Picture_4' && $c != 'Picture_5' && $c != 'Picture_6')
					<td class="h6 pr-4" style="background-color:silver;"><div class="float-right"><?php echo ucwords(str_replace('_', ' ', $c)); ?></div></td>
					@if($c == "Price")
					<td class="pl-4">{{number_format($p->$c)}} TK</td>
					@else
					<td class="pl-4">{{$p->$c}}</td>
					@endif						
					@endif
				</tr>
				@endforeach
			</table>			
			@endforeach		    
		</div>
	</section>
	</br></br>

	<section>
		<div class="container pl-0">	
			<div class="col-12 py-2 bg-dark">				
				<h5 class="text-white" style="display:inline">Video Review</h5>
			</div>
			@foreach($details as $p)
			@if($p->Video_Link != NULL)
			<div class="embed-responsive embed-responsive-16by9">
				<iframe class="embed-responsive-item" src="{{$p->Video_Link}}" allowfullscreen></iframe>
			</div>
			@else
			<h6 class="text-center bg-danger text-white py-3">No Video Is Available Now</h6>
			@endif
			@endforeach		
		</div>	
	</section>
	</br></br>

	<section>
		<div class="container pl-0">	
			<div class="col-12 py-2 bg-dark">				
				<h5 class="text-white" style="display:inline">{{count($ratingReview)}} Customer's Reviews</h5>
			</div>
			<div class="col-6 mt-3">				
				<div class="mb-2">
					@for($i=0; $i<$avgRating; $i++)	    				
					<i class="fas fa-star text-success"></i>   		
					@endfor
					@for($i=0; $i<(5-$avgRating); $i++)	    				
					<i class="far fa-star"></i>   		
					@endfor
					<span class="font-italic font-weight-bold ml-3 text-success">{{$avgRating}} <span class="text-dark">out of 5</span></span>
				</div>
				
				<div class="progress mb-1">			  
					<lable class="bg-white">5 Star &nbsp</lable><div class="progress-bar bg-success" role="progressbar" style="width:{{$stars[5]}}%;" aria-valuemin="0" aria-valuemax="100">{{$stars[5]}}%</div>
				</div>
				<div class="progress mb-1">			  
					<lable class="bg-white">4 Star &nbsp</lable><div class="progress-bar bg-success" role="progressbar" style="width:{{$stars[4]}}%;" aria-valuemin="0" aria-valuemax="100">{{$stars[4]}}%</div>
				</div>
				<div class="progress mb-1">			  
					<lable class="bg-white">3 Star &nbsp</lable><div class="progress-bar bg-success" role="progressbar" style="width:{{$stars[3]}}%;" aria-valuemin="0" aria-valuemax="100">{{$stars[3]}}%</div>
				</div>
				<div class="progress mb-1">			  
					<lable class="bg-white">2 Star &nbsp</lable><div class="progress-bar bg-success" role="progressbar" style="width:{{$stars[2]}}%;" aria-valuemin="0" aria-valuemax="100">{{$stars[2]}}%</div>
				</div>
				<div class="progress">			  
					<lable class="bg-white">1 Star &nbsp</lable><div class="progress-bar bg-success" role="progressbar" style="width:{{$stars[1]}}%;" aria-valuemin="0" aria-valuemax="100">{{$stars[1]}}%</div>
				</div>	
				<hr>			
			</div>
			
			<div class="col-12">
				@foreach($ratingReview as $rr)
				<h6>{{$rr->name}}</h6>
				<div>					
					@for($i=0; $i<$rr->customer_rating; $i++)	    				
					<i class="fas fa-star text-success"></i>   		
					@endfor
					@for($i=0; $i<(5-$rr->customer_rating); $i++)	    				
					<i class="far fa-star"></i>   		
					@endfor
					<span class="font-italic font-weight-bold ml-2 text-success">{{$rr->customer_rating}} <span class="text-dark">out of 5</span></span>
				</div>
				<p style="font-size:15px">{{$rr->customer_comment}}</p>
				<hr>
				@endforeach
				<hr  style="display:none">
			</div>			    
		</div>
	</section>
	
	<P id="destination" class="text-white">THIS IS DESTINATION</P>

	<section>
		<div class="container pl-0">	
			<div class="col-12 pt-2 pb-1 mb-2 bg-dark">
				<h5 class="text-white">Question & Answer</h5>
			</div>
			@if(Session::has('approvalMsg'))
			<div class="alert alert-success text-info">
				<i class="far fa-check-circle"> {{session()->get('approvalMsg')}}</i>
			</div>
			@endif
			@if(Session::get('type') != "admin")
			<span class="font-italic font-weight-bold ml-3 text-dark">Have a question about this product? Please ask now.</span>		
			<div class="col-12 pl-2 mt-2">					
				<form method="post">
					<div class="form-row pl-2">
						@if(Session::has('email'))
				    	<div class="col">
				      		<input type="text" class="form-control" name="name" value="{{Session::get('name')}}" readonly>
				    	</div>
				    	<div class="col">
				      		<input type="email" class="form-control" name="email" value="{{Session::get('email')}}" readonly>
				    	</div>
				    	@else
				    	<div class="col">
				      		<input type="text" class="form-control" name="name" value="{{old('name')}}"  maxlength=30 placeholder="Name***" required>
				      		@foreach ($errors->get('name') as $error)
			    			<small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> {{  $error }}</i></small>		  
			    			@endforeach
				    	</div>
				    	<div class="col">
				      		<input type="text" class="form-control" name="email" value="{{old('email')}}"  maxlength=30 placeholder="Email***" required>
				      		@foreach ($errors->get('email') as $error)
			    			<small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> {{  $error }}</i></small>		  
			    			@endforeach
				    	</div>
				    	@endif
				  	</div>
				  	<div class="form-row pl-2 mt-3">
				    	<div class="col">
				      		<textarea class="form-control" name="question" rows="3" placeholder="Your Question***" maxlength=150 required>{{old('question')}}</textarea>
				      		@foreach ($errors->get('question') as $error)
			    			<small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> {{  $error }}</i></small>		  
			    			@endforeach
				    	</div>
				    	<div class="col">
				      		<button type="submit" class="btn btn-warning mt-3">Continue</button>
				    	</div>
				  	</div>
				</form>
				<hr>
			</div>
			@endif
			@if(count($questionAnswer) > 0)
			<div class="col-12 pl-3">
				@foreach($questionAnswer as $qn)				
				<span class="h6">{{$qn->name}}</span></br>				
				<span class="text-primary" style="font-size:14px;">{{$qn->question}}</span>
				<div class="ml-5 mb-1 pl-3 py-1 bg-light">
					<span class="h6">Tech Gear</span></br>				
					<span style="font-size:14px;">{{$qn->answer}}</span>
				</div>
				@endforeach
				<hr>
			</div>
			@endif							    
		</div>
	</section>
	</br></br>

	@if($relatedProduct != null)
	<section>
		<div class="container pl-0">	
			<div class="col-12 pt-2 pb-1 bg-dark">
				<h5 class="text-white">Related Products</h5>
			</div>

			<div class="row pl-2">				
				@foreach($relatedProduct as $rp)
				<div class="card ml-2 mb-2 rounded-0" style="width:218px; background-color:silver">
			  		<a href="/component/{{$table}}/{{$rp->Id}}"><img src="{{$rp->Picture_1}}" class="card-img-top" height=218 width=218 alt="Foul"></a>
			  		<div class="card-body px-2">
			    		<h6 class="card-title font-weight-bold"><a style="text-decoration:none;" href="/component/{{$table}}/{{$rp->Id}}"><span>{{ucfirst($rp->Title)}}</span></a></h6>
			   		 	Warranty: <span style="color:brown">{{$rp->Warranty}}</span></br>						
						Price: <span style="color:brown">TK {{number_format($rp->Price)}}</span></br>
						@if(Session::get('type') != "admin")
			    		<button pid="{{$table.'&'.$rp->Id}}" title="{{$rp->Title}}" picture="{{$rp->Picture_1}}" price="{{$rp->Price}}" quantity=1 class="btn btn-primary mt-3 ml-1 add_to_cart"><i class="fas fa-cart-plus"></i></a></button>
			    		@if(Session::get('type') == "user")
			    		<a href="/user/add-to-wishlist/{{$table}}/{{$rp->Id}}" class="btn btn-primary mt-3 ml-3"><i class="far fa-heart"></i></a>
			    		@else
			    		<a href="/login" class="btn btn-primary mt-3 ml-3"><i class="far fa-heart"></i></a>
			    		@endif
			    		@endif
			    		<a href="" class="btn btn-primary mt-3 ml-3"><i class="fas fa-exchange-alt"></i></a>
			  		</div>
				</div>
				@endforeach			
			</div>				    
		</div>
	</section>
	@endif
@endsection

@section('script')
	<script>
		$(document).ready(function(){
			
			question_answer_auto();

			$('.sub_image').click(function(){
				var path = $(this).attr('path');
				//console.log(path);
				$('#main_image').attr('src', path);				
			});

			$('.add_to_cart').click(function(){
				var pid = $(this).attr('pid');
				var title = $(this).attr('title');
				var price = $(this).attr('price');
				var quantity = $(this).attr('quantity');
				var picture = $(this).attr('picture');
				/*console.log(pid);				
				console.log(title);
				console.log(price);
				console.log(quantity);
				console.log(picture);*/
				$.ajax({
					url: "/cart/add",
					method: "post",
					data: {pid:pid, title:title, price:price, quantity:quantity, picture:picture},
					success: function(data){
						location.reload();
					}
				});
			});

			function question_answer_auto(value)
			{
				var value = "{{session()->has('qn')}}";
				console.log(value);
				if(value == 1)
				{
					$('#destination')[0].scrollIntoView(true);
				}
			}			

		});
	</script>
@endsection