<?php $__env->startSection('title'); ?>
	<title>My Wishlist</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
	<h5 class="text-center text-info">My Wish List(<?php echo e($wishlistCount); ?>)</h5>
	</br>
	<?php if($wishlistCount > 0): ?>
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
			<?php $__currentLoopData = $wishlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	    	<tr style="font-size:13.5px">
	      		<td>
	      			<a href="/component/<?php echo e($wl->table); ?>/<?php echo e($wl->pid); ?>"><img src="<?php echo e($wl->picture); ?>" class='border border-dark' alt='foul' height=50 width=50></a>
	      		</td>
	      		<td>
	      			<a href="/component/<?php echo e($wl->table); ?>/<?php echo e($wl->pid); ?>" style="text-decoration:none;font-weight:"><?php echo e($wl->title); ?></a>
	      		</td>
	      		<td>
	      			<p><?php echo e($wl->model); ?></p>
	      		</td>
	      		<td>
	      			<p>TK <?php echo e($wl->price); ?></p>
	      		</td>
	      		<td style="white-space: nowrap">
	      			<a href="/user/wishlist-to-cart/<?php echo e($wl->id); ?>/<?php echo e($wl->table); ?>/<?php echo e($wl->pid); ?>" class="btn btn-info mr-2"><i class="fas fa-cart-plus"></i></a>
	      			<a href="/user/delete-from-wishlist/<?php echo e($wl->id); ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
	      		</td>
	    	</tr>
	    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
	<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user-main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>