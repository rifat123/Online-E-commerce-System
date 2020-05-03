<?php $__env->startSection('title'); ?>
    <title>Add New Product</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('middle'); ?>
    <div class="container">
  		<div class="row mt-2 mb-3">
        <div class="col-12 pt-1">
            <a href="/admin/home" class=" float-right btn btn-danger btn-sm"><i class="fas fa-backward"> Back</i></a>
        </div>
      </div>

      <div class="row mb-4">
        <div class="col-7 mx-auto pt-1 bg-dark rounded">
            <h4 class="text-center text-white"><?php if($show == "add-product"){echo "Add New Product";} else{echo "View, Update, Delete Product";} ?></h4>
        </div>
      </div>

      <div class="row" style="height:350px">
        <?php if($show == "add-product"): ?>
    		<div class="col-7 mx-auto bg-dark text-white px-4 border border-primary rounded">
      		  </br><h5 class="text-center mb-4 text-info">Select a Category</h5>
    			   <?php $__currentLoopData = $table; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  				  <a href="/admin/product-control/add-product/<?php echo e($t->Table_Name); ?>" class="btn btn-sm btn-primary mb-2"><?php echo e(ucWords(str_replace('_', ' ', $t->Table_Name))); ?></a>
    			   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>              
    		</div>
        

        <?php elseif($show == "vud-product"): ?>
    		<div class="col-7 mx-auto bg-dark text-white px-4 border border-primary rounded">
      			</br><h5 class="text-center mb-4 text-info">Select a Category</h5>
             <?php $__currentLoopData = $table; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="/admin/product-control/view-product/<?php echo e($t->Table_Name); ?>" class="btn btn-sm btn-primary mb-2"><?php echo e(ucWords(str_replace('_', ' ', $t->Table_Name))); ?></a>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    		</div>
        <?php endif; ?>
  		</div>

	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin-main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>