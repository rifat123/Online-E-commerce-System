<?php $__env->startSection('title'); ?>
	<title>My Reviews</title>
	<link href="/css/star-rating.css" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
	<h4 class="text-center text-info">My Reviews</h4>
	</br>
	<?php if(count($orders) > 0): ?>
	<?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<div class="container pb-1" style="background-color:ghostwhite">	
		<div class="row">
			<div class="col-7">
				<span style="font-size:17px">Order <span class="text-info">#<?php echo e($order->id); ?></span></span></br>
			</div>			
		</div>
		<hr class="mt-1 mb-2 row">		
		
		<?php $__currentLoopData = $productList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<?php if($order->id == $pl->oid): ?>
		<div class="row">	    		
	    	<div class="col-1">
	     		<a href="/component/<?php echo e($pl->table_name); ?>/<?php echo e($pl->pid); ?>"><img src="<?php echo e($pl->picture); ?>" class='border border-dark' alt='Image Unavailable' height=50 width=50></a>
	    	</div>
	      	<div class="col-5 pl-1">
	     		<a href="/component/<?php echo e($pl->table_name); ?>/<?php echo e($pl->pid); ?>" style="text-decoration:none;font-weight:"><?php echo e($pl->title); ?></a>
	    	</div>	    	
	    	<div class="col-6">
	    		<?php if($pl->customer_rating != null): ?>
	    		<div class="row">
	    			<div class="col-3 px-0 ">
	    				<?php for($i=0; $i<$pl->customer_rating; $i++): ?>	    				
	    			 	<i class="fas fa-star text-danger"></i>   		
	    			 	<?php endfor; ?>
	    			 	<?php for($i=0; $i<(5-$pl->customer_rating); $i++): ?>	    				
	    			 	<i class="far fa-star"></i>   		
	    			 	<?php endfor; ?>    		
	    			</div>
	    			<div class="col-9 pr-1">
	    				<?php echo e($pl->customer_comment); ?>

	    			</div>
	    		</div>
	     		<?php else: ?>
	      		<div class="mx-auto" style="width:188px">
	     			<button class="btn btn-sm btn-warning btn-rr"  op_id="<?php echo e($pl->id); ?>" data-toggle="modal" data-target="#myModal">Please Review This Product</button>
	    		</div>
	     		<?php endif; ?>
	    	</div>	    		
	    </div>
	    <hr class="mt-1 mb-2 row">
	    <?php endif; ?>
	    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>		
	</div>
	</br></br>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php endif; ?>

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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user-main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>