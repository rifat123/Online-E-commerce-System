<?php $__env->startSection('title'); ?>
	<title>Edit Account</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
  		<div class="col-6 p-3 mb-2 bg-dark text-white offset-3">
  			<h4 class="text-center">Your Personal Informations</h4>
  			</br>
              
  			<form method="post">
  				<?php if(!session()->has('old')): ?>
  					<?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  					<div class="form-group">
  					<label>Full Name<span class="text-danger">***</span></label>
  					<input type="text" class="form-control" name="name" Value="<?php echo e($user->name); ?>" maxlength="30" required>
  					<input type="hidden" name="uid" Value="<?php echo e($user->id); ?>">
  					<?php $__currentLoopData = $errors->get('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			    	<small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> <?php echo e($error); ?></i></small>		  
			    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
					<div class="form-group">
  					<label>Email<span class="text-danger">***</span></label>
  					<input type="text" class="form-control" name="email" id="email" Value="<?php echo e($user->email); ?>" maxlength="40" required>
  					<?php $__currentLoopData = $errors->get('email'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			    	<small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> <?php echo e($error); ?></i></small>		  
			    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			    	<?php if(session('emailExist')): ?>
			    	<small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> <?php echo e(session('emailExist')); ?></i></small>
			    	<?php endif; ?>
					</div>
					<div class="form-group">
  					<label>Phone Number<span class="text-danger">***</span></label>
  					<input type="text" class="form-control" name="phone" Value="<?php echo e($user->phone); ?>" maxlength="11" required>
  					<?php $__currentLoopData = $errors->get('phone'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			    	<small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> <?php echo e($error); ?></i></small>		  
			    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
					<div class="form-group">
  					<label>Fax</label>
  					<input type="text" class="form-control" name="fax" Value="<?php echo e($user->fax); ?>" maxlength="11">
  					<?php $__currentLoopData = $errors->get('fax'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			    	<small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> <?php echo e($error); ?></i></small>		  
			    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
					<button type="submit" class="btn btn-primary">Save</button>
  					<a href="/user/home" class="btn float-right btn-primary">Cancel</a>
  					<?php break; ?>
  					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  				
  				<?php elseif((session()->has('old'))): ?>
  				<div class="form-group">
  					<label>Full Name<span class="text-danger">***</span></label>
  					<input type="text" class="form-control" name="name" Value="<?php echo e(old('name')); ?>" maxlength="30" required>
  					<input type="hidden" name="uid" Value="<?php echo e(Session::get('id')); ?>">
  					<?php $__currentLoopData = $errors->get('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			    	<small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> <?php echo e($error); ?></i></small>		  
			    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
					<div class="form-group">
  					<label>Email<span class="text-danger">***</span></label>
  					<input type="text" class="form-control" name="email" id="email" Value="<?php echo e(old('email')); ?>" maxlength="40" required>
  					<?php $__currentLoopData = $errors->get('email'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			    	<small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> <?php echo e($error); ?></i></small>		  
			    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			    	<?php if(session('emailExist')): ?>
			    	<small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> <?php echo e(session('emailExist')); ?></i></small>
			    	<?php endif; ?>
					</div>
					<div class="form-group">
  					<label>Phone Number<span class="text-danger">***</span></label>
  					<input type="text" class="form-control" name="phone" Value="<?php echo e(old('phone')); ?>" maxlength="11" required>
  					<?php $__currentLoopData = $errors->get('phone'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			    	<small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> <?php echo e($error); ?></i></small>		  
			    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
					<div class="form-group">
  					<label>Fax</label>
  					<input type="text" class="form-control" name="fax" Value="<?php echo e(old('fax')); ?>" maxlength="11">
  					<?php $__currentLoopData = $errors->get('fax'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			    	<small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> <?php echo e($error); ?></i></small>		  
			    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
					<button type="submit" class="btn btn-primary">Save</button>
  					<a href="/user/home" class="btn float-right btn-primary">Cancel</a>
  				<?php endif; ?>
  			</form>
              
  		</div>	
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
	<!-- <script>
		$(document).ready(function(){

			$("").submit(function(event) {
				//event.preventDefault();
				var email = $('#email').val();
				var id = 14;//$('#uid').val();
				console.log(email);
				//console.log(id);				
				$.ajax({
					url:"/test/5",
					method:"POST",
					data:{email:email, id:id},
					success:function(data){
						console.log(data);
					}
				});

			});
		});
	</script> -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user-main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>