<?php $__env->startSection('title'); ?>
    <title>View Product</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('middle'); ?>
    <div class="container-fluid">
          <div class="row mt-4">
            <div class="col-12 pt-1">
              <h4 class="text-center text-danger mb-3">Products of <?php echo ucfirst($table);?><a href="/admin/product-control/vud-product" class=" float-right btn btn-danger btn-sm"><i class="fas fa-backward"> Back</i></a></h4>
            </div>          
          </div>

      </br>
      <div class="row">
    		<div class="table-responsive">
    			<table class="table table-dark table-bordered">
  					<thead>
    					<tr style="white-space: nowrap">
                  <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      						<th scope="col"><?php echo e(ucWords(str_replace('_', ' ', $c->Column_Name))); ?></th>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                  <th scope="col">Action</th>
    					</tr>
  					</thead>
  					<tbody>
  						<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    					<tr style="white-space: nowrap">
                  <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php $temp = $c->Column_Name; $lol = $d->$temp;?>
      						<?php if($c->Column_Type == 'file'): ?>
                    <?php if($lol != null): ?>
                      <td><img src="<?php echo e($lol); ?>" alt="No Image" height=50 width=50></td>
                    <?php else: ?>
                      <td></td>
                    <?php endif; ?>
                  <?php else: ?>
                  <td><?php echo e($lol); ?></td>
                  <?php endif; ?>
      						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                 
      						<td>
      							<a href="/admin/product-control/edit/<?php echo $table; ?>/<?php echo e($d->Id); ?>" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
      						  <button type="button" class="btn btn-sm btn-danger btn-del" value="<?php echo e($d->Id); ?>" data-toggle="modal" data-target="#myModal"><i class="fas fa-trash-alt"></i></button>
                  </td>
                 
    					</tr>
    					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>					
  					</tbody>
				</table>
    		</div>
    	</div>
    </div>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header justify-content-center">
            <h4 class="modal-title" id="myModalLabel">Are You Really Delete this</h4>
          </div>
          <form action="/admin/product-control/view-product/<?php echo $table; ?>" method="post">
              <?php echo e(csrf_field()); ?>

            <div class="modal-footer">
              <input type="hidden" id="product-id" name="pid" value="">
              <button type="button" class="btn btn-primary" data-dismiss="modal">No, Cancel</button>
              <button type="submit" class="btn btn-danger">Yes, Delete</button>
            </div>
          </form>
        </div>
      </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
  <script>
      $(document).ready(function(){
        $('.btn-del').click(function(){
          $("#product-id").val($(this).val());
          //console.log($(this).val());
        });
      });
  </script>>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin-main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>