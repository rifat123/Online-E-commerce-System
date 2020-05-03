<?php $__env->startSection('title'); ?>
	<title>Login</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('middle'); ?>	
	<section id="form"><!--form-->
		<div class="container">
			<div class="mx-auto mt-5 px-4 py-5 border border-primary rounded bg-dark" style="width:400px">
				<h4 class="text-center text-white">Login To Your Account</h4></br>
				<form method="POST">			  		
			  		<div class="form-group">			    		
			    		<input type="text" class="form-control" name="email" value="<?php echo e(old('email')); ?>" maxlength=40 placeholder="Email Address***" required>
			    		<?php $__currentLoopData = $errors->get('email'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			    		<small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> <?php echo e($error); ?></i></small>		  
			    		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			    		<?php if(session()->get('msg')): ?>
			    		<small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"><?php echo e(session()->get('msg')); ?></i></small>
			    		<?php endif; ?>
			  		</div>
			  		<div class="form-group">		    		
			    		<input type="password" class="form-control" name="password" placeholder="Password***" maxlength=20  required>
			    		<?php $__currentLoopData = $errors->get('password'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			  			<small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> <?php echo e($error); ?></i></small>		  
			  			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			  		</div>
			  		<div class="form-group">
			  			<a href="" class="text-info" style="text-decoration:none">Forgot Password?</a>
			 		</div>			  					  				  
			  		<button type="submit" class="btn btn-primary btn-block">Login</button>
				</form>
			</div>
		</div>
		</br></br>
	</section><!--/form-->	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>