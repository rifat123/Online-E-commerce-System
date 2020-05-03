<?php $__env->startSection('title'); ?>
    <title>Add Data To | Category</title>
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
            <h4 class="text-center text-white">Add Data To <?php echo ucfirst($scs); ?></h4>
        </div>
      </div>
      
      <div class="row" style="height:350px">
        <div class="col-7 mx-auto bg-dark text-white px-4 py-4 border border-primary rounded">
            <h5 class="text-center mb-4 text-info">Select a Category</h5>
             <?php $__currentLoopData = $table; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="/admin/home-control/add-data/<?php echo $scs; ?>/<?php echo e($t->Table_Name); ?>" class="btn btn-sm btn-primary mb-2"><?php echo e(ucWords(str_replace('_', ' ', $t->Table_Name))); ?></a>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin-main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>