<?php $__env->startSection('title'); ?>
    <title>Add Product | <?php echo ucfirst($scs);?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('middle'); ?>
    <div class="container-fluid">
        <div class="row mt-4">
          <div class="col-12 pt-1">
            <h4 class="text-center text-danger mb-3">Add a Product For <?php echo ucfirst($scs);?><a href="/admin/home-control/add-data/<?php echo $scs;?>" class=" float-right btn btn-danger btn-sm"><i class="fas fa-backward"> Back</i></a></h4>
          </div>          
        </div>
    </div>
    
    </br>
    <div class="container-fluid">
      <div class="row">
        <div class="table-responsive">
          <table class="table table-dark table-bordered table-hover">
            <thead>
              <tr style="white-space: nowrap">
                  <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <th scope="col"><?php echo e(ucWords(str_replace('_', ' ', $c->Column_Name))); ?></th>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                  <th scope="col">Operation</th>
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

                  <?php if($cs == 0): ?>
                  <td>
                    <a href="/admin/home-control/add-data/<?php echo $scs; ?>/<?php echo $table; ?>/<?php echo e($d->Id); ?>" class="btn btn- btn-success btn-block"><i class="fas fa-plus"></i></a>
                  </td>
                  <?php endif; ?>
                  <?php if($cs == 1): ?>
                  <td>
                    <form method="POST">
                      <input type="hidden" name="Id" value="<?php echo e($d->Id); ?>">
                      <button class="btn btn-success btn-block"><i class="fas fa-plus"></i></button>
                    </form>
                  </td>
                  <?php endif; ?>
                  <?php if($cs == 2): ?>
                  <td> 
                    <a href="/admin/home-control/add-data-to/static/<?php echo $table.'_'.$d->Id; ?>" class="btn btn- btn-success btn-block"><i class="fas fa-plus"></i></a>
                  </td>
                  <?php endif; ?>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>         
            </tbody>
        </table>
        </div>
      </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin-main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>