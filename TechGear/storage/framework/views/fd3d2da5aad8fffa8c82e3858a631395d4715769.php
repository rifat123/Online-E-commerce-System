<?php $__env->startSection('middle'); ?>
    <div class="container">
    </br>
    </br>
    	<div class="row">
    		<div class="col-4 p-3 mb-2 bg-dark text-white offset-4">
    			<h4 class="text-center">Your Account's Informations</h4>
    			</br>
                <?php $oldData = session()->get('oldData');  ?>
                <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    			<form method="POST">
    				<div class="form-group">
    					<label>Name<span class="text-danger">***</span></label>
                        <?php if($oldData): ?>
                        <input type="text" class="form-control" name="name"  Value="<?php echo array_pop($oldData); ?>" required>
    					<?php else: ?>
                        <input type="text" class="form-control" name="name"  Value="<?php echo e($admin->name); ?>" required>
    					<?php endif; ?>
                        <?php $__currentLoopData = $errors->get('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> <?php echo e($error); ?></i></small>        
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  					</div>
  					<div class="form-group">
    					<label>Email<span class="text-danger">***</span></label>
                        <?php if($oldData): ?>
                        <input type="text" class="form-control" name="email"  Value="<?php echo array_pop($oldData); ?>" required>
    					<?php else: ?>
                        <input type="text" class="form-control" name="email"  Value="<?php echo e($admin->email); ?>" required>
    					<?php endif; ?>
                        <?php $__currentLoopData = $errors->get('email'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> <?php echo e($error); ?></i></small>        
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  					</div>
  					<div class="form-group">
    					<label>Password</label>
                        <input type="text" class="form-control" name="password">    					
    					<?php $__currentLoopData = $errors->get('password'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> <?php echo e($error); ?></i></small>        
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  					</div>
  					<div class="form-group">
    					<label>Confirm Password</label>
                        <input type="text" class="form-control" name="confirm_password">
    					<?php $__currentLoopData = $errors->get('confirm_password'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> <?php echo e($error); ?></i></small>        
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  					</div>
  					<button type="submit" class="btn btn-primary">Save</button>
    				<a href="/admin/home" class="btn float-right btn-primary">Cancel</a>
    			</form>
                <?php break; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    		</div>
    		<!-- <div class="col-4 bg-success">
    			<h4>1</h4>
    		</div>
    		<div class="col-4 bg-danger">
    			<h4>1</h4>
    		</div> -->
    	</div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin-main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>