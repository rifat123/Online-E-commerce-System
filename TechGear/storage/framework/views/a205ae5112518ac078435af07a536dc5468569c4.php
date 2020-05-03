<?php $__env->startSection('title'); ?>
	<title>Change Password</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
  		<div class="col-6 py-3 mb-2 bg-dark text-white offset-3">
  			<h4 class="text-center">Change Your Password</h4>
  			</br>
  			<form method="post">
  				<div class="form-group">
  					<label>Password<span class="text-danger">***</span></label>
  					<input type="password" class="form-control" name="password" maxlength="15" required>
  					<?php $__currentLoopData = $errors->get('password'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			    	<small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> <?php echo e($error); ?></i></small>		  
			    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
				<div class="form-group">
  					<label>Confirm Password<span class="text-danger">***</span></label>
  					<input type="password" class="form-control" name="confirmPassword" maxlength="15" required>
  					<?php $__currentLoopData = $errors->get('confirmPassword'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			    	<small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> <?php echo e($error); ?></i></small>		  
			    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>		   
				</div>					
				<button type="submit" class="btn btn-primary">Submit</button>
  				<a href="/user/home" class="btn float-right btn-primary">Cancel</a>
  			</form>           
  		</div>	
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user-main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>