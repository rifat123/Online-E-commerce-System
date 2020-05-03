<?php $__env->startSection('title'); ?>
	<title>Order Informations</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
	<h5 class="text-center text-info">Order Informations</h5>
	</br>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user-main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>