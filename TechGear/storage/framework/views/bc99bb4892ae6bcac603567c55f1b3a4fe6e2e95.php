<?php $__env->startSection('title'); ?>
	<title>My Order History</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
	<h4 class="text-center text-info">My Orders</h4>
	</br>
	<?php if(count($orders) > 0): ?>
	<?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<div class="container" style="background-color:beige">	
		<div class="row">
			<div class="col-7">
				<span style="font-size:17px">Order <span class="text-info">#<?php echo e($order->id); ?></span></span></br>
				<small class="text-muted">Placed on <?php echo e($order->created); ?></small>
			</div>
			<div class="col-3 pt-2">
				<span style="font-size:20px"><span class="text-muted">Subtotal:</span> TK <?php echo e(number_format($order->subtotal)); ?></span>
			</div>
			<div class="col-2">
				<h4 class="mt-2 float-right"><span class="badge badge-info"><?php echo e($order->status); ?></span></h4>
			</div>			
		</div>
		<hr class="mt-1 mb-2 row">		
		<table class="table table-borderless table-sm mb-1">
			<tbody>
				<?php $__currentLoopData = $productList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php if($order->id == $pl->oid): ?>
	    		<tr>
	      			<td>
	      				<a href="/component/<?php echo e($pl->table_name); ?>/<?php echo e($pl->pid); ?>"><img src="<?php echo e($pl->picture); ?>" class='border border-dark' alt='Image Unavailable' height=50 width=50></a>
	      			</td>
	      			<td>
	      				<a href="/component/<?php echo e($pl->table_name); ?>/<?php echo e($pl->pid); ?>" style="text-decoration:none;font-weight:"><?php echo e($pl->title); ?></a>
	      			</td>
	      			<td>
	      				<span class="text-muted">Qty:</span> <?php echo e($pl->quantity); ?></span>
	      			</td>
	      			<td>
	      				<span class="text-muted">Unit Price:</span> TK <?php echo e(number_format($pl->price)); ?></span>
	      			</td>
	      			<td>
	      				<span class="text-muted">Total:</span> TK <?php echo e(number_format($pl->price*$pl->quantity)); ?></span>
	      			</td>
	    		</tr>
	    		<?php endif; ?>
	    		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</tbody>
		</table>
		<hr class="my-0 row">
		<div class="ml-1 pb-2">
			<span style="font-size:13px"><b>Payment Method:</b> <?php echo e($order->payment_method); ?></span></br>
			<?php $__currentLoopData = $address; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php if($order->aid == $ad->id): ?>
			<span style="font-size:13px"><b>Shipped To:</b> <?php echo e($ad->name); ?> | <?php echo e($ad->phone); ?>, <?php echo e($ad->company); ?>, <?php echo e($ad->address_1); ?>, <?php echo e($ad->thana); ?>, <?php echo e($ad->district); ?>, <?php echo e($ad->division); ?>, <?php echo e($ad->post_code); ?>, <?php echo e($ad->country); ?></span>
	    	<?php endif; ?>
	    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>			
		</div>
	</div>
	</br></br>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user-main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>