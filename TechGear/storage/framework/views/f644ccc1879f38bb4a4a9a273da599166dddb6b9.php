<?php $__env->startSection('title'); ?>
	<title>Product Comparison</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('middle'); ?>
	<div class="container-fluid pb-1" style="background-color:floralwhite">		
		<h5 class="text-center">Product Comparison(<?php echo e(count($compareCollection)); ?>)</h5>		
	</div>
	</br>
	<div class="container py-3" style="background-color:floralwhite">
		<?php if($data): ?>
		<table class="table table-sm table-bordered table-hover table-block" style="font-size:14px">
			<tbody>
				<tr>
					<td>Product Name</td>
					<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<td><a href="/component/<?php echo e($dat->Cat); ?>/<?php echo e($dat->Id); ?>" style="text-decoration:none"><?php echo e($dat->Title); ?></a></td>					
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tr>
				<tr>
					<td>Image</td>
					<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>					
					<td class="text-center"><a href="/component/<?php echo e($dat->Cat); ?>/<?php echo e($dat->Id); ?>" style="text-decoration:none"><img src="<?php echo e($dat->Picture_1); ?>" class="border border-dark" alt="Foul" height="120" width="120"></a></td>					
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tr>
				<?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $col): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php if($col->Column_Name != "Id" && $col->Column_Name != "Title" && $col->Column_Name != "Picture_1" && $col->Column_Name != "Picture_2" && $col->Column_Name != "Picture_3" && $col->Column_Name != "Picture_4" && $col->Column_Name != "Picture_5" && $col->Column_Name != "Picture_6" && $col->Column_Name != "Deleted" && $col->Column_Name != "Quantity" && $col->Column_Name != "Warranty" && $col->Column_Name != "Price"): ?>
					<tr>
						<td><?php echo e(str_replace('_',' ',$col->Column_Name)); ?></td>
						<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php $c = $col->Column_Name; if(property_exists($dat, "$c")){$d = $dat->$c;} else{$d = "-";} ?>
						<td><?php echo e($d); ?></td>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tr>
					<?php endif; ?>					
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td>Warranty</td>
					<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<td><?php echo e($dat->Warranty); ?></td>					
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tr>
				<tr>
					<td>Price</td>
					<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<td>TK <?php echo e(number_format($dat->Price)); ?></td>					
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tr>
				<tr>
					<td></td>
					<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<td>
						<div class="mx-auto" style="width:130px">
							<?php if(session()->get('type') != 'admin'): ?>
							<button class="btn btn-primary btn-sm btn-block add_to_cart" pid="<?php echo e($dat->Cat.'&'.$dat->Id); ?>" title="<?php echo e($dat->Title); ?>" picture="<?php echo e($dat->Picture_1); ?>" price="<?php echo e($dat->Price); ?>" quantity=1>ADD TO CART</button>
							<?php endif; ?>
							<a href="/compare/remove/<?php echo e($dat->Cat); ?>/<?php echo e($dat->Id); ?>" class="btn btn-danger btn-sm text-white btn-block">Remove</i></a>
						<div>
					</td>					
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tr>
			</tbody>
		</table>
		<?php else: ?>
			<p class="text-center">No Products Selected</p>
		<?php endif; ?>
	</div>
	</br></br></br>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
	<script>
		$(document).ready(function(){

			$('.add_to_cart').click(function(){
				var pid = $(this).attr('pid');
				var title = $(this).attr('title');
				var price = $(this).attr('price');
				var quantity = $(this).attr('quantity');
				var picture = $(this).attr('picture');
				
				$.ajax({
					url: "/cart/add",
					method: "post",
					data: {pid:pid, title:title, price:price, quantity:quantity, picture:picture},
					success: function(data){
						location.reload();
					}
				});
			});

		});
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>