<?php $__env->startSection('title'); ?>
	<title>Product Details</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('middle'); ?>	
	<section>
		<div class="container mt-2">
			<div class="row mt-4">
				<div class="col-4 px-0 py-0">
					<div class="px-3 py-3 border">
						<?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<img src="<?php echo e($d->Picture_1); ?>" class="img-fluid" id="main_image" height=350 width=350 alt="No Image Found">					    
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
					<div class="mt-4">
						<?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if($d->Picture_1 != null): ?>
						<a href="javascript:void(0)" path="<?php echo e($d->Picture_1); ?>" class="sub_image"><img src="<?php echo e($d->Picture_1); ?>" class="img-fluid ml-2 border" height=50 width=50 alt="No Image Found"></a>						
						<?php endif; ?>
						<?php if($d->Picture_2 != null): ?>
						<a href="javascript:void(0)" path="<?php echo e($d->Picture_2); ?>" class="sub_image"><img src="<?php echo e($d->Picture_2); ?>" class="img-fluid ml-2 border" height=50 width=50 alt="No Image Found"></a>						
						<?php endif; ?>
						<?php if($d->Picture_3 != null): ?>
						<a href="javascript:void(0)" path="<?php echo e($d->Picture_3); ?>" class="sub_image"><img src="<?php echo e($d->Picture_3); ?>" class="img-fluid ml-2 border" height=50 width=50 alt="No Image Found"></a>						
						<?php endif; ?>
						<?php if($d->Picture_4 != null): ?>
						<a href="javascript:void(0)" path="<?php echo e($d->Picture_4); ?>" class="sub_image"><img src="<?php echo e($d->Picture_4); ?>" class="img-fluid ml-2 border" height=50 width=50 alt="No Image Found"></a>						
						<?php endif; ?>
						<?php if($d->Picture_5 != null): ?>
						<a href="javascript:void(0)" path="<?php echo e($d->Picture_5); ?>" class="sub_image"><img src="<?php echo e($d->Picture_5); ?>" class="img-fluid ml-2 border" height=50 width=50 alt="No Image Found"></a>						
						<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>									
				</div>				

				<div class="col-7 offset-1">							
					<?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<h4 class="font-weight-bold"><?php echo e($p->Title); ?></h4></br>
					<h4>Price: <span style="color:brown">TK <?php echo e(number_format($p->Price)); ?></span></h4>
					</br>
					<h5>Highlites</h5>
					Model: <?php echo e($p->Model); ?></br>
					Warranty: <?php echo e($p->Warranty); ?>					
					<div class="mt-4 d-flex ">
						<?php if(Session::get('type') != "admin"): ?>					
						<button class="btn btn-primary btn-sm ml-2 add_to_cart"  pid="<?php echo e($table.'&'.$p->Id); ?>" title="<?php echo e($p->Title); ?>" picture="<?php echo e($p->Picture_1); ?>" price="<?php echo e($p->Price); ?>" quantity=1><i class="fas fa-cart-plus"></i> ADD TO CART</button>
						<?php if(Session::get('type') == "user"): ?>							
						<a href="/user/add-to-wishlist/<?php echo e($table); ?>/<?php echo e($p->Id); ?>" class="btn btn-outline-secondary btn-sm ml-2"><i class="far fa-heart"></i> Add to Wishlist</a>
						<?php else: ?>
						<a href="/login" class="btn btn-outline-secondary btn-sm ml-2"><i class="far fa-heart"></i> Add to Wishlist</a>
						<?php endif; ?>
						<?php endif; ?>					
						<a href="/compare/add/<?php echo e($table); ?>/<?php echo e($p->Id); ?>" class="btn btn-outline-secondary btn-sm ml-2"><i class="fas fa-exchange-alt"></i> Add to Compare</a>							
					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
			 
			<?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<table class="table table-sm table-bordered">
				<?php $__currentLoopData = $column; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<?php if($p->$c != null && $c != 'Picture_1' && $c != 'Picture_2' && $c != 'Picture_3' && $c != 'Picture_4' && $c != 'Picture_5' && $c != 'Picture_6'): ?>
					<td class="h6 pr-4" style="background-color:silver;"><div class="float-right"><?php echo ucwords(str_replace('_', ' ', $c)); ?></div></td>
					<?php if($c == "Price"): ?>
					<td class="pl-4"><?php echo e(number_format($p->$c)); ?> TK</td>
					<?php else: ?>
					<td class="pl-4"><?php echo e($p->$c); ?></td>
					<?php endif; ?>						
					<?php endif; ?>
				</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</table>			
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>		    
		</div>
	</section>
	</br></br>

	<section>
		<div class="container pl-0">	
			<div class="col-12 py-2 bg-dark">				
				<h5 class="text-white" style="display:inline">Video Review</h5>
			</div>
			<?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php if($p->Video_Link != NULL): ?>
			<div class="embed-responsive embed-responsive-16by9">
				<iframe class="embed-responsive-item" src="<?php echo e($p->Video_Link); ?>" allowfullscreen></iframe>
			</div>
			<?php else: ?>
			<h6 class="text-center bg-danger text-white py-3">No Video Is Available Now</h6>
			<?php endif; ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>		
		</div>	
	</section>
	</br></br>

	<section>
		<div class="container pl-0">	
			<div class="col-12 py-2 bg-dark">				
				<h5 class="text-white" style="display:inline"><?php echo e(count($ratingReview)); ?> Customer's Reviews</h5>
			</div>
			<div class="col-6 mt-3">				
				<div class="mb-2">
					<?php for($i=0; $i<$avgRating; $i++): ?>	    				
					<i class="fas fa-star text-success"></i>   		
					<?php endfor; ?>
					<?php for($i=0; $i<(5-$avgRating); $i++): ?>	    				
					<i class="far fa-star"></i>   		
					<?php endfor; ?>
					<span class="font-italic font-weight-bold ml-3 text-success"><?php echo e($avgRating); ?> <span class="text-dark">out of 5</span></span>
				</div>
				
				<div class="progress mb-1">			  
					<lable class="bg-white">5 Star &nbsp</lable><div class="progress-bar bg-success" role="progressbar" style="width:<?php echo e($stars[5]); ?>%;" aria-valuemin="0" aria-valuemax="100"><?php echo e($stars[5]); ?>%</div>
				</div>
				<div class="progress mb-1">			  
					<lable class="bg-white">4 Star &nbsp</lable><div class="progress-bar bg-success" role="progressbar" style="width:<?php echo e($stars[4]); ?>%;" aria-valuemin="0" aria-valuemax="100"><?php echo e($stars[4]); ?>%</div>
				</div>
				<div class="progress mb-1">			  
					<lable class="bg-white">3 Star &nbsp</lable><div class="progress-bar bg-success" role="progressbar" style="width:<?php echo e($stars[3]); ?>%;" aria-valuemin="0" aria-valuemax="100"><?php echo e($stars[3]); ?>%</div>
				</div>
				<div class="progress mb-1">			  
					<lable class="bg-white">2 Star &nbsp</lable><div class="progress-bar bg-success" role="progressbar" style="width:<?php echo e($stars[2]); ?>%;" aria-valuemin="0" aria-valuemax="100"><?php echo e($stars[2]); ?>%</div>
				</div>
				<div class="progress">			  
					<lable class="bg-white">1 Star &nbsp</lable><div class="progress-bar bg-success" role="progressbar" style="width:<?php echo e($stars[1]); ?>%;" aria-valuemin="0" aria-valuemax="100"><?php echo e($stars[1]); ?>%</div>
				</div>	
				<hr>			
			</div>
			
			<div class="col-12">
				<?php $__currentLoopData = $ratingReview; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<h6><?php echo e($rr->name); ?></h6>
				<div>					
					<?php for($i=0; $i<$rr->customer_rating; $i++): ?>	    				
					<i class="fas fa-star text-success"></i>   		
					<?php endfor; ?>
					<?php for($i=0; $i<(5-$rr->customer_rating); $i++): ?>	    				
					<i class="far fa-star"></i>   		
					<?php endfor; ?>
					<span class="font-italic font-weight-bold ml-2 text-success"><?php echo e($rr->customer_rating); ?> <span class="text-dark">out of 5</span></span>
				</div>
				<p style="font-size:15px"><?php echo e($rr->customer_comment); ?></p>
				<hr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
			<?php if(Session::has('approvalMsg')): ?>
			<div class="alert alert-success text-info">
				<i class="far fa-check-circle"> <?php echo e(session()->get('approvalMsg')); ?></i>
			</div>
			<?php endif; ?>
			<?php if(Session::get('type') != "admin"): ?>
			<span class="font-italic font-weight-bold ml-3 text-dark">Have a question about this product? Please ask now.</span>		
			<div class="col-12 pl-2 mt-2">					
				<form method="post">
					<div class="form-row pl-2">
						<?php if(Session::has('email')): ?>
				    	<div class="col">
				      		<input type="text" class="form-control" name="name" value="<?php echo e(Session::get('name')); ?>" readonly>
				    	</div>
				    	<div class="col">
				      		<input type="email" class="form-control" name="email" value="<?php echo e(Session::get('email')); ?>" readonly>
				    	</div>
				    	<?php else: ?>
				    	<div class="col">
				      		<input type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>"  maxlength=30 placeholder="Name***" required>
				      		<?php $__currentLoopData = $errors->get('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			    			<small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> <?php echo e($error); ?></i></small>		  
			    			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				    	</div>
				    	<div class="col">
				      		<input type="text" class="form-control" name="email" value="<?php echo e(old('email')); ?>"  maxlength=30 placeholder="Email***" required>
				      		<?php $__currentLoopData = $errors->get('email'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			    			<small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> <?php echo e($error); ?></i></small>		  
			    			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				    	</div>
				    	<?php endif; ?>
				  	</div>
				  	<div class="form-row pl-2 mt-3">
				    	<div class="col">
				      		<textarea class="form-control" name="question" rows="3" placeholder="Your Question***" maxlength=150 required><?php echo e(old('question')); ?></textarea>
				      		<?php $__currentLoopData = $errors->get('question'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			    			<small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> <?php echo e($error); ?></i></small>		  
			    			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				    	</div>
				    	<div class="col">
				      		<button type="submit" class="btn btn-warning mt-3">Continue</button>
				    	</div>
				  	</div>
				</form>
				<hr>
			</div>
			<?php endif; ?>
			<?php if(count($questionAnswer) > 0): ?>
			<div class="col-12 pl-3">
				<?php $__currentLoopData = $questionAnswer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>				
				<span class="h6"><?php echo e($qn->name); ?></span></br>				
				<span class="text-primary" style="font-size:14px;"><?php echo e($qn->question); ?></span>
				<div class="ml-5 mb-1 pl-3 py-1 bg-light">
					<span class="h6">Tech Gear</span></br>				
					<span style="font-size:14px;"><?php echo e($qn->answer); ?></span>
				</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<hr>
			</div>
			<?php endif; ?>							    
		</div>
	</section>
	</br></br>

	<?php if($relatedProduct != null): ?>
	<section>
		<div class="container pl-0">	
			<div class="col-12 pt-2 pb-1 bg-dark">
				<h5 class="text-white">Related Products</h5>
			</div>

			<div class="row pl-2">				
				<?php $__currentLoopData = $relatedProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="card ml-2 mb-2 rounded-0" style="width:218px; background-color:silver">
			  		<a href="/component/<?php echo e($table); ?>/<?php echo e($rp->Id); ?>"><img src="<?php echo e($rp->Picture_1); ?>" class="card-img-top" height=218 width=218 alt="Foul"></a>
			  		<div class="card-body px-2">
			    		<h6 class="card-title font-weight-bold"><a style="text-decoration:none;" href="/component/<?php echo e($table); ?>/<?php echo e($rp->Id); ?>"><span><?php echo e(ucfirst($rp->Title)); ?></span></a></h6>
			   		 	Warranty: <span style="color:brown"><?php echo e($rp->Warranty); ?></span></br>						
						Price: <span style="color:brown">TK <?php echo e(number_format($rp->Price)); ?></span></br>
						<?php if(Session::get('type') != "admin"): ?>
			    		<button pid="<?php echo e($table.'&'.$rp->Id); ?>" title="<?php echo e($rp->Title); ?>" picture="<?php echo e($rp->Picture_1); ?>" price="<?php echo e($rp->Price); ?>" quantity=1 class="btn btn-primary mt-3 ml-1 add_to_cart"><i class="fas fa-cart-plus"></i></a></button>
			    		<?php if(Session::get('type') == "user"): ?>
			    		<a href="/user/add-to-wishlist/<?php echo e($table); ?>/<?php echo e($rp->Id); ?>" class="btn btn-primary mt-3 ml-3"><i class="far fa-heart"></i></a>
			    		<?php else: ?>
			    		<a href="/login" class="btn btn-primary mt-3 ml-3"><i class="far fa-heart"></i></a>
			    		<?php endif; ?>
			    		<?php endif; ?>
			    		<a href="" class="btn btn-primary mt-3 ml-3"><i class="fas fa-exchange-alt"></i></a>
			  		</div>
				</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>			
			</div>				    
		</div>
	</section>
	<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
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
				var value = "<?php echo e(session()->has('qn')); ?>";
				console.log(value);
				if(value == 1)
				{
					$('#destination')[0].scrollIntoView(true);
				}
			}			

		});
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>