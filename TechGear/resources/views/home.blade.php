@extends('layouts.main')

@section('title')
	<title>Home | Tech Gear</title>
@endsection

@section('middle')
	</br>	
	<section id="slidr"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner">
					  		<?php $i = 'active' ; ?>
							@foreach($sliderData as $sd)
					    	<div class="carousel-item {{$i}}">
					      		<img src="{{$sd->Picture}}" class="d-block w-100" alt="Problem" />
					    		<div class="carousel-caption d-none d-md-block">
					    	    	<a href="/component/{{$sd->Table_Name}}/{{$sd->Product_Id}}" class="btn btn-warning">Get it now</a>
					    		</div>
					    	</div>
					    	<?php $i = null ; ?>
							@endforeach					    
					  	</div>
					  	<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
					    	<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					    	<span class="sr-only">Previous</span>
					  	</a>
					  	<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
					    	<span class="carousel-control-next-icon" aria-hidden="true"></span>
					    	<span class="sr-only">Next</span>
					  	</a>
					</div>					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	<hr>
	</br>
	
	<section id="collection">
		<div class="container">
			<div class="row pl-1">
				<?php for($n=0; $n<$count; $n++){ ?>
				<div class="card ml-2 mb-2 rounded-0" style="width:218px; background-color:silver">
			  		<img src="<?php echo $collectionArr[$n]['Picture_1']; ?>" class="card-img-top" height=218 width=218 alt="Foul">
			  		<div class="card-body px-2">
			    		<h6 class="card-title font-weight-bold"><a style="text-decoration:none;" href="/component/<?php echo $collectionArr[$n]['Table_Name']; ?>/<?php echo $collectionArr[$n]['Product_Id']; ?>"><span><?php echo strtoupper($collectionArr[$n]['Model']); ?></span></a></h6>
			   		 	Warranty: <span style="color:brown"><?php echo $collectionArr[$n]['Warranty']; ?></span></br>						
						Today's Price: <span style="color:brown">TK <?php echo number_format($collectionArr[$n]['Price']); ?></span></br>
			    		<a href="/component/<?php echo $collectionArr[$n]['Table_Name']; ?>/<?php echo $collectionArr[$n]['Product_Id']; ?>" class="btn btn-primary mt-3">Buy Now</a>
			  		</div>
				</div>
				<?php } ?>			
			</div>
		</div>
	</section>
	<hr>

	<section id="static">
		<div class="container">
			<div class="row">
				@foreach($staticData as $sd)
					@if($sd->Info != null)
						<a href="/note/{{$sd->Id}}"><img class="ml-3 mb-3" src="{{$sd->Picture}}" height=237 width=360 alt="Foul"></a>
					@endif
					@if($sd->Info == null)
					<a href="/component/{{$sd->Table_Name}}/{{$sd->Product_Id}}"><img class="ml-3 mb-3" src="{{$sd->Picture}}" height=237 width=360 alt="Foul"></a>	
					@endif
				@endforeach
			</div>			
		</div>
	</section>
@endsection