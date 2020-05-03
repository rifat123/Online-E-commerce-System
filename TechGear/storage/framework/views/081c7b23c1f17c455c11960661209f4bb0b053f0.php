<?php $__env->startSection('middle'); ?>
    <div class="centered">
        <a href="/admin/home-control" class="btn btn-lg btn-success">Home Control</a>
        <a href="/admin/user-control" class="btn btn-lg btn-success">User Control</a>
        <a href="/admin/product-control" class="btn btn-lg btn-success">Product Control</a>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin-main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>