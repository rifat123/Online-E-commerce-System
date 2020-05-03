<?php $__env->startSection('title'); ?>
	<title>Home | Tech Gear</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('middle'); ?>
	</br>	
	<section id="slidr"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner">
					  		<?php $i = 'active' ; ?>
							<?php $__currentLoopData = $sliderData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					    	<div class="carousel-item <?php echo e($i); ?>">
					      		<img src="<?php echo e($sd->Picture); ?>" class="d-block w-100" alt="Problem" />
					    		<div class="carousel-caption d-none d-md-block">
					    	    	<a href="/component/<?php echo e($sd->Table_Name); ?>/<?php echo e($sd->Product_Id); ?>" class="btn btn-warning">Get it now</a>
					    		</div>
					    	</div>
					    	<?php $i = null ; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>					    
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
				<?php $__currentLoopData = $staticData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php if($sd->Info != null): ?>
						<a href="/note/<?php echo e($sd->Id); ?>"><img class="ml-3 mb-3" src="<?php echo e($sd->Picture); ?>" height=237 width=360 alt="Foul"></a>
					<?php endif; ?>
					<?php if($sd->Info == null): ?>
					<a href="/component/<?php echo e($sd->Table_Name); ?>/<?php echo e($sd->Product_Id); ?>"><img class="ml-3 mb-3" src="<?php echo e($sd->Picture); ?>" height=237 width=360 alt="Foul"></a>	
					<?php endif; ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>			
		</div>
	</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>