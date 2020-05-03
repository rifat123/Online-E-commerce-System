<?php $__env->startSection('title'); ?>
	<title>My Question</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
	<h5 class="text-center text-info">My Qusetions(<?php echo e(count($questionAnswer)); ?>)</h5>
	</br>
	<?php if(count($questionAnswer) > 0): ?>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th scope="col">My Qusetion</th>
				<th scope="col">Tech Gear Answer</th>
				<th scope="col">Product</th>
			</tr>			  
		</thead>
		<tbody>
			<?php $__currentLoopData = $questionAnswer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	    	<tr style="font-size:13.5px">
	      		<td>
	      			<lable><?php echo e($qn->question); ?></lable></br>
	      			<lable class="text-muted"><?php echo e($qn->qdate); ?>&nbsp&nbsp<?php echo e($qn->qtime); ?></lable>
	      		</td>
	      		<td>
	      			<lable><?php echo e($qn->answer); ?></lable></br>
	      			<lable class="text-muted"><?php echo e($qn->adate); ?>&nbsp&nbsp<?php echo e($qn->atime); ?></lable>
	      		</td>
	      		<td>
	      			<a href="/component/<?php echo e($qn->table); ?>/<?php echo e($qn->pid); ?>" style="text-decoration:none;font-weight:"><?php echo e($qn->title); ?></a>
	      		</td>
	    	</tr>
	    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
	<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user-main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>