<?php $__env->startSection('title'); ?>
	<title></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('middle'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>