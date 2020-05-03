<?php $__env->startSection('middle'); ?>
	
	<div class="container">
		    <div class="row mt-4">
          <div class="col-12 pt-1">
            <h4 class="text-center text-danger mb-3">Edit User<a href="/admin/user-control" class=" float-right btn btn-danger btn-sm"><i class="fas fa-backward"> Back</i></a></h4>
          </div>          
        </div>
		
		<?php if($errors->any()): ?>
    	<div class="alert alert-danger">
        	<ul>
            	<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                	<li><?php echo e($error); ?></li>
            	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        	</ul>
    	</div>
		<?php endif; ?>

		<form method="POST">
			<?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  			<div class="form-group">
    			<label class="text-primary">Full Name<i class='h5 text-danger'> ****</i></label></label>
    			<input type="text" class="form-control" name="name" value="<?php echo e($u->name); ?>">
    			<small class="form-text text-danger">Max Length of Full Name with Space is 20</small>
  			</div>
  			<div class="form-group">
    			<label class="text-primary">Email<i class='h5 text-danger'> ****</i></label></label>
    			<input type="email" class="form-control" name="email" value="<?php echo e($u->email); ?>">
    			<small class="form-text text-danger">Max Length is 30</small>
  			</div>
  			<div class="form-group">
    			<label class="text-primary">Password<i class='h5 text-danger'> ****</i></label></label>
    			<input type="text" class="form-control" name="password" value="<?php echo e($u->password); ?>">
    			<small class="form-text text-danger">Minimum Length is 5 & Max Length is 15 </small>
  			</div>
  			<div class="form-group">
    			<label class="text-primary">Address</label>
    			<input type="text" class="form-control" name="address" value="<?php echo e($u->address); ?>">
  			</div>
  			<button type="submit" class="btn btn-primary">Submit</button>
  			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</form>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin-main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>