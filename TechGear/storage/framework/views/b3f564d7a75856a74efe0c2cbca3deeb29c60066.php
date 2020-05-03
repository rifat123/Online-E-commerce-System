<?php $__env->startSection('title'); ?>
	<title>Add | Category</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('middle'); ?>
	<div class="container">
		<div class="row mt-2 mb-3">
		  <div class="col-12 pt-1">
		    <h4 class="text-center text-danger">Add Category Step-1<a href="/admin/home" class=" float-right btn btn-danger btn-sm"><i class="fas fa-backward"> Back</i></a></h4>
		  </div>          
		</div>
		</br></br>

		<div class="mx-auto px-5 py-4 border border-primary rounded" style="width:400px">
			<form method="POST">
		  		<div class="form-group">
		    		<label>Parent Category</label>
		    		<input type="text" class="form-control" name="category" value="<?php echo e(old('category')); ?>" list="categoryList" maxlength=20>		    
		  			<datalist id="categoryList">
		  				<?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		  				<option value="<?php echo e($cat->Category); ?>">
		  				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		  			</datalist>
		  		</div>
		  		
		  		<div class="form-group">
		    		<label>Child Category<i class="h5 text-danger"> ****</i></label>
		    		<input type="text" class="form-control" name="table_name" value="<?php echo e(old('table_name')); ?>" maxlength=20 required>
		    		<?php if(session('wrongCat')): ?>
		    		<small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"><?php echo e(session('wrongCat')); ?></i></small>    		
		    		<?php else: ?>
		    		<small class="form-text text-info">This field should be unique</small>
		    		<?php endif; ?>
		  		</div>
		  		<div class="form-group">
		    		<label>Number of Properties<i class="h5 text-danger"> ****</i></label>
		    		<input type="number" class="form-control" name="num_properties" value="<?php echo e(old('num_properties')); ?>" min=1 max=30 required>
		    		<small class="form-text text-info"><span class=" font-weight-bold font-italic">Title, Brand, Model, Warranty, Quantity, Price, Prictures</span> are the default properties. No need to add these.</small>
		  		</div>		  
		  		<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin-main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>