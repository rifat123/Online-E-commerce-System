<?php $__env->startSection('middle'); ?>
	<div class="container">
    	<div class="row">
        	<div class="col-12">
            	<a href="/admin/home-control/add-data/<?php echo $scs; ?>/<?php echo $table; ?>" class="btn btn-success float-right">Back</a>
        	</div>
    	</div>
    	</br>
    	<div class="row">
    		<div class="col-7 bg-dark p-5 offset-1">
    			<h4 class="text-center text-danger">Add an Image to show on Slider</h4>
    			</br>
    			<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    			<h6 class="text-white">Title: <?php echo e($d->Title); ?></h6>
    			<h6 class="text-white">Brand: <?php echo e($d->Brand); ?></h6>
    			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    			</br>
    			<form method="POST" enctype="multipart/form-data">
    				<div class="text-success" style="width:220px">
    					<input type="file" class="form-control-file" name="picture" accept="image/png,image/jpeg" required>
    				</div>
    				<small class="form-text text-warning">File type should be JPEG or PNG and size should be 120x200</small>
    				</br>
    				<div>
    					<button type="submit" class="btn btn-success">Upload</button>
    				</div>
    			</form>

    			<?php if($errors->any()): ?>
    			</br>
    			<div>
       				<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               		<h6 class="text-danger"><?php echo e($error); ?></h6>
            		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        			
        		</div>
    			<?php endif; ?>
    		</div>
    		<div class="col-3 p-1 bg-dark">
    			<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    			<image src="<?php echo e($d->Picture); ?>" class="img-fluid">
    			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    		</div>
    	</div>
	</div>
     

  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin-main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>