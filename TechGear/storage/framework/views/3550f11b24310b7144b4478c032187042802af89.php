<?php $__env->startSection('title'); ?>
	<title>Registration</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('middle'); ?>	
	<section id="form">
		<div class="container">
			<div class="mx-auto mt-4 px-4 py-5 border border-primary rounded bg-dark" style="width:400px">
				<h4 class="text-center text-white">Create An Account</h4></br>
				<form method="POST">
			  		<div class="form-group">			    		
			    		<input type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" maxlength=30 placeholder="Full Name***" required>	
			  		</div>
			  		
			  		<div class="form-group">			    		
			    		<input type="text" class="form-control" name="email" value="<?php echo e(old('email')); ?>" maxlength=40 placeholder="Email Address***" required>
			    		<?php $__currentLoopData = $errors->get('email'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			    		<small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> <?php echo e($error); ?></i></small>		  
			    		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			  		</div>
			  		<div class="form-group">		    		
			    		<input type="password" class="form-control" name="password" placeholder="Password***" maxlength=20  required>
			    		<?php $__currentLoopData = $errors->get('password'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			  			<small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> <?php echo e($error); ?></i></small>		  
			  			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			  		</div>
			  		<div class="form-group">		    		
			    		<input type="password" class="form-control" name="confirmPassword" placeholder="Confirm Password***" maxlength=20  required>			    		
			  			<?php $__currentLoopData = $errors->get('confirmPassword'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			  			<small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> <?php echo e($error); ?></i></small>		  
			  			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			  		</div>			  				  
			  		<button type="submit" class="btn btn-primary btn-block">Signup</button>
				</form>
				<?php if(session('success')): ?>
					<h6 class="text-success text-center mt-4"><?php echo e(session('success')); ?></h6>
				<?php endif; ?>
			</div>
		</div>
	</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>