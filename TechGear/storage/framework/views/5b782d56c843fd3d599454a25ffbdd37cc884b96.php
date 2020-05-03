<?php $__env->startSection('title'); ?>
	<title>Disable | Category</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('middle'); ?>
	<div class="container">
		<div class="row mt-2 mb-3">
		  <div class="col-12 pt-1">
		    <a href="/admin/home" class=" float-right btn btn-danger btn-sm"><i class="fas fa-backward"> Back</i></a>
		  </div>          
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-10 mx-auto">
				<h4 class="text-center text-info mb-3">Category Enable Disable</h4>
			</div>
		</div>
		<div class="row">
			<div class="col-10 mx-auto ">
				<div class="table-responsive">				
					<table class="table table-hover table-dark table-sm">
					  <thead>
					    <tr style="white-space: nowrap">
					      <th scope="col">#</th>
					      <th scope="col">Parent Category</th>
					      <th scope="col">Child Category</th>
					      <th scope="col">Handle</th>
					    </tr>
					  </thead>
					  <tbody>
					  	<?php $i=1; ?>
					  	<?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $res): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					    <tr style="white-space: nowrap">
					      <th><?php echo e($i); ?></th>
					      
					      <?php if(is_numeric($res->Category)): ?>
					      <td></td>
					      <?php else: ?>
					      <td><?php echo e(ucwords($res->Category)); ?></td>
					      <?php endif; ?>

					      <td><?php echo e(ucwords(str_replace('_',' ',$res->Table_Name))); ?></td>
					      
					      <?php if($res->Deleted == null): ?>
					      
					      	<td><button class="btn btn-danger btn-sm btn-block disable" value="<?php echo e($res->Id); ?>">Disable</button></td>
					      	<?php else: ?>
					      	<td><button class="btn btn-success btn-sm btn-block enable" value="<?php echo e($res->Id); ?>">Enable</button></td>
					      	<?php endif; ?>
					      
					    </tr>
					    <?php $i++; ?>
					    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					  </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
	<script>
		$(document).ready(function(){
			
			$('.disable').click(function(){
				var id = $(this).val();				
				console.log(id);
				$.ajax({
					url: "/test/3",
					method: "POST",
					data: {id:id, opt:'disable'},
					success: function(result){						
						if(result == "fine")
						{
							location.reload();
						}
					}
				});
			});

			$('.enable').click(function(){
				var id = $(this).val();				
				console.log(id);
				$.ajax({
					url: "/test/3",
					method: "POST",
					data: {id:id, opt:'enable'},
					success: function(result){						
						if(result == "fine")
						{
							location.reload();
						}
					}
				});
			});

		});
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin-main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>