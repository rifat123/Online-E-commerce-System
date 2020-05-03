<?php $__env->startSection('middle'); ?>
  <?php if($show == 1){ ?>
    <div class="container">
      <div class="row">
        <div class="col-12">
            <h4 class="text-center text-danger">You have to select a Category, from which you will select a Product to add into <?php echo ucfirst($scs); ?></h4>
        </div>
      </div>
      <a href="/admin/home-control" type="submit" class="float-right btn btn-success">Back</a>
      </br></br></br></br>

      <div class="row" style="height:350px">
        <div class="col-7 offset-2 bg-info text-white">
            </br><h5 class="text-center text-white">Select a Catagory</h5>
             <?php $__currentLoopData = $table; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="/admin/home-control/add-data/<?php echo $scs; ?>/<?php echo e($t->Table_Name); ?>" class="btn btn-sm btn-primary"><?php echo e(ucFirst($t->Table_Name)); ?></a>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
    </div>
  <?php } ?>

  <?php if($show == 2){ ?>
    <div class="container">
        <div class="row">
          <div class="col-8">
            <h4 class="text-center text-danger">Add a Product to show into <?php echo ucfirst($scs);?></h4>
          </div>

          <div class="col-4">
            <a href="/admin/home-control/add-data/<?php echo $scs;?>" class="float-right btn btn-success">Back</a> 
          </div>
        </div>
    </div>
    </br>
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <table class="table table-dark">
            <thead>
              <tr>
                  <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <th scope="col"><?php echo e($c->Column_Name); ?></th>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                  <th scope="col">Add</th>
              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                  <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php $temp = $c->Column_Name; $lol = $d->$temp;?>
                  <td><?php echo e($lol); ?></td>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <td>
                    <a href="/admin/home-control/add-data/<?php echo $scs; ?>/<?php echo $table; ?>/<?php echo e($d->Id); ?>" type="button" class="btn btn-sm btn-primary">Add</a>
                  </td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>         
            </tbody>
        </table>
        </div>
      </div>
    </div>
  <?php } ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin-main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>