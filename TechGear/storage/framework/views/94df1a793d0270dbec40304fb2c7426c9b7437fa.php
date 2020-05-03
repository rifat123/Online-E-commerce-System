<?php $__env->startSection('title'); ?>
	<title>Add Address</title>
<?php $__env->stopSection(); ?>

<?php if($opt == "ab"): ?>
<?php $__env->startSection('main'); ?>
<?php elseif($opt == "check" || $opt == "ho"): ?>
<?php $__env->startSection('middle'); ?>
</br>
<?php endif; ?>
	<div class="col-6 p-3 mb-2 bg-dark text-white offset-3">
  		<h4 class="text-center">Add New Address</h4>
  		</br>              
  		<form method="post">  					
  			<div class="form-group">
  				<label>Full Name<span class="text-danger">***</span></label>
  				<input type="text" class="form-control form-control-sm" name="name" Value="<?php echo e(old('name')); ?>" maxlength="30" required>
  				<?php $__currentLoopData = $errors->get('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			    <small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> <?php echo e($error); ?></i></small>		  
			    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
			<div class="form-group">
  				<label>Company</label>
  				<input type="text" class="form-control form-control-sm" name="company" Value="<?php echo e(old('company')); ?>" maxlength="50">
  				<?php $__currentLoopData = $errors->get('company'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			    <small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> <?php echo e($error); ?></i></small>		  
			    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>			    	
			</div>
			<div class="form-group">
  				<label>Address 1<span class="text-danger">***</span></label>
  				<input type="text" class="form-control form-control-sm" name="address_1" Value="<?php echo e(old('address_1')); ?>" maxlength="50" required>
  				<?php $__currentLoopData = $errors->get('address_1'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			    <small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> <?php echo e($error); ?></i></small>		  
			    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
			<div class="form-group">
  				<label>Address 2</label>
  				<input type="text" class="form-control form-control-sm" name="address_2" Value="<?php echo e(old('address_2')); ?>" maxlength="50">
  				<?php $__currentLoopData = $errors->get('address_2'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			    <small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> <?php echo e($error); ?></i></small>		  
			    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
			<div class="form-group">
  				<label>Thana<span class="text-danger">***</span></label>
  				<input type="text" class="form-control form-control-sm" name="thana" Value="<?php echo e(old('thana')); ?>" maxlength="50" required>
  				<?php $__currentLoopData = $errors->get('thana'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			    <small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> <?php echo e($error); ?></i></small>		  
			    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
			<div class="form-group">
  				<label>District<span class="text-danger">***</span></label>
  				<input type="text" class="form-control form-control-sm" name="district" Value="<?php echo e(old('district')); ?>" maxlength="11" required>
  				<?php $__currentLoopData = $errors->get('district'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			    <small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> <?php echo e($error); ?></i></small>		  
			    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
			<div class="form-group">
  				<label>Division<span class="text-danger">***</span></label>
  				<input type="text" class="form-control form-control-sm" name="division" Value="<?php echo e(old('division')); ?>" maxlength="11" required>
  				<?php $__currentLoopData = $errors->get('division'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			    <small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> <?php echo e($error); ?></i></small>		  
			    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
			<div class="form-group">
  				<label>Country<span class="text-danger">***</span></label>
  				<input type="text" class="form-control form-control-sm" name="country" Value="Bangladesh" maxlength="11" readonly>
			</div>
			<div class="form-group">
  				<label>Post Code<span class="text-danger">***</span></label>
  				<input type="text" class="form-control form-control-sm" name="post_code" Value="<?php echo e(old('post_code')); ?>" maxlength="5" required>
  				<?php $__currentLoopData = $errors->get('post_code'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			    <small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> <?php echo e($error); ?></i></small>		  
			    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
			<button type="submit" class="btn btn-primary">Add</button>
  			<?php if($opt == "ab"): ?>
  			<a href="/user/address-book" class="btn float-right btn-primary">Cancel</a>
  			<?php elseif($opt == "check"): ?> 
  			<a href="/user/cart/checkout" class="btn float-right btn-primary">Cancel</a>
        <?php elseif($opt == "ho"): ?> 
        <a href="/user/home" class="btn float-right btn-primary">Cancel</a>
  			<?php endif; ?>  				
  		</form>              
  	</div>		
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user-main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>