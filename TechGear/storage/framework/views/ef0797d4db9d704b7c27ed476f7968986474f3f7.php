<?php $__env->startSection('title'); ?>
	<title>My Home</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
	<h4 class="text-white text-center bg-secondary pb-2 rounded">Manage My Account</h4>
	<div class="row mx-0 mt-3">		
		<div class="card text-white bg-secondary mb-3 mr-4" style="width:20rem;">
  			<div class="card-header h5">Personal Informations | <a href="/user/edit-account" class="text-warning" style="text-decoration:none">EDIT</a></div>
  			<div class="card-body pb-0">
  				<?php $__currentLoopData = $account; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $acc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    			<h6 class="card-title text-warning"><?php echo e($acc->name); ?></h6>
    			<h6 class="card-title text-warning"><?php echo e($acc->email); ?></h6>
    			<h6 class="card-title text-warning"><?php echo e($acc->phone); ?></h6>
    			<h6 class="card-title text-warning"><?php echo e($acc->fax); ?></h6>
    			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   		
  			</div>
		</div>

		<div class="card text-white bg-secondary mb-3" style="width:36rem;">
			<?php if($address): ?>
			<?php $__currentLoopData = $address; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ua): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  			<div class="card-header h5">Address Informations | <a href="/user/address-book/ho/<?php echo e($ua->id); ?>" class="text-warning" style="text-decoration:none">EDIT</a></div>
  			<div class="card-body pb-0">  				
    			<h6 class="card-title text-white">DEFAULT SHIPPING ADDRESS</h6>
    			<h6 class="card-title text-warning"><?php echo e($ua->name); ?></h6>    				
    			<h6 class="card-title text-warning">
    				<?php 	      				
	      				if($ua->company != null) {echo"$ua->phone, ";}
	      				if($ua->company != null) {echo"$ua->company, ";}
	      				if($ua->address_1 != null) {echo"$ua->address_1, ";}
	      				if($ua->address_2 != null) {echo"$ua->address_2, ";}
	      				if($ua->thana != null) {echo"$ua->thana, ";}
	      				if($ua->district != null) {echo"$ua->district, ";}
	      				if($ua->division != null) {echo"$ua->division, ";}
	      				if($ua->post_code != null) {echo"$ua->post_code";}
	      			?>
    			</h6>   			   		
  			</div>
  			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  			<?php else: ?>
  			<div class="card-header h5">Address Informations</div>
  			<div class="card-body pb-0  text-center">  				
  				<a class="btn btn-success" href="/user/add-address/ho">ADD ADDRESS</a>
  			</div>
  			<?php endif; ?>
		</div>	

		<div class="card text-white bg-secondary mb-3" style="width:58rem;">
  			<div class="card-header h5">Recent Orders</div>
  			<div class="card-body pb-0 pt-1 px-2">
  				<?php if($orders): ?>
  				<table class="table table-borderless">
  					<tbody>
  						<tr class="font-weight-bold">
  							<td>Order #</td>
  							<td>Placed On</td>
  							<td>Status</td>
  							<td>Items</td>
  							<td>Subtotal</td>
  							<td>Action</td>
  						</tr>
  						<?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  						<tr class="text-warning">
  							<td># <?php echo e($order->id); ?></td>
  							<td><?php echo e($order->created); ?></td>
  							<td><?php echo e($order->status); ?></td>
  							<td><?php echo e($order->items); ?></td>
  							<td>TK <?php echo e(number_format($order->subtotal)); ?></td>
  							<td><a href="/user/order-history" style="text-decoration:none;color:black">View Details</a></td>
  						</tr>
  						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  					</tbody>  					
  				</table>
  				<?php else: ?>
  				<h6 class="text-center text-warning">No Order Has Been Created Yet</h6>
  				<?php endif; ?>  		
  			</div>
		</div>	
	</div>
	</br></br></br>	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user-main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>