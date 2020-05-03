<?php $__env->startSection('middle'); ?>
	
	<div class="container">
		<div class="row mt-4">
      <div class="col-12 pt-1">
        <h4 class="text-center text-danger mb-3">Edit Product of <?php echo ucfirst($table);?><a href="/admin/product-control/view-product/<?php echo e($table); ?>" class=" float-right btn btn-danger btn-sm"><i class="fas fa-backward"> Back</i></a></h4>
      </div>          
    </div>
			
		<?php if($errors->any()): ?>
    	<div class="alert alert-danger">
        	<ul>
            	<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                	<li><?php echo e($error); ?></li>
            	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        	</ul>
    	</div>
		<?php endif; ?>

		<form method="POST" enctype="multipart/form-data">
        <?php 
          $rowStart = 2;
          $rowEnd = 1;
          $oldData = session()->get('oldData');

          $temp = "";
          $i = 0;
          foreach($pcolumn as $c)
          {
            $temp = $c->Column_Name;
            $temp1 = $data[0]->$temp;
            $t = str_replace('_',' ',$temp);
            if(($rowStart)%2 == 0)
            {
              echo "<div class='row'>";
            }
                echo "<div class='form-group col-6'>";
                      if($c->Required == null)
                      {
                        echo "<label class='text-primary'>$t</label>";
                      }
                      else
                      {
                        echo "<label class='text-primary'>$t<i class='h5 text-danger'> ****</i></label>";
                      }
                      
                      if($temp =="Quantity" || $temp=="Price")
                      {
                        if($oldData)
                        {
                          $temp1 = array_pop($oldData);
                        }
                        echo "<input type='$c->Column_Type' min=0 max='$c->Max_Length' class='form-control' name='$temp' value='$temp1' $c->Required>";
                      }
                      else
                      {
                        if($oldData)
                        {
                          $temp1 = array_pop($oldData);
                        }
                        echo "<input type='$c->Column_Type' maxlength='$c->Max_Length' class='form-control' name='$temp' value='$temp1' $c->Required>";
                      }
                      
                      echo "<small class='form-text text-danger'> Suggestion: $c->Dummy_Data</small>";
                echo"</div>";
                
            if(($rowEnd)%2 == 0)
            {
              echo"</div>";
            }
            $rowStart++;
            $rowEnd++;
            $i++;
          }

          if(($rowEnd)%2 == 0)
          {
            echo"</div>";
          }
        ?>
        <div class="row">
          <div class="col-3">
            <label class='text-primary'>Picture-1</label>
            </br>
            <img src="<?php echo e($data[0]->Picture_1); ?>" alt="No Image" height=100 width=100>
            <input type="hidden" name="P1" value="off">
            <input type="file" class="form-control-file" name="Picture_1" accept="image/png,image/jpeg">
            <small class='form-text text-danger'> Note: Size of picture should be 600x600</small>
            <small class='form-text text-danger'> Note: This will be shown as main Picture</small>
          </div>
          <div class="col-3">           
            <label class='text-primary'>Picture-2</label>
            </br>
            <img src="<?php echo e($data[0]->Picture_2); ?>" alt="No Image" height=100 width=100>
            <input type="checkbox" name="P2"> Delete
            <input type="file" class="form-control-file" name="Picture_2" accept="image/png,image/jpeg">
            <small class='form-text text-danger'> Note: Size of Picture should be 600x600</small>
          </div>
          <div class="col-3">            
            <label class='text-primary'>Picture-3</label>
            </br>
            <img src="<?php echo e($data[0]->Picture_3); ?>" alt="No Image" height=100 width=100>
            <input type="checkbox" name="P3"> Delete
            <input type="file" class="form-control-file" name="Picture_3" accept="image/png,image/jpeg">
            <small class='form-text text-danger'> Note: Size of Picture should be 600x600</small>
          </div>
          <div class="col-3">
            <label class='text-primary'>Picture-4</label>
            </br>
            <img src="<?php echo e($data[0]->Picture_4); ?>" alt="No Image" height=100 width=100>
            <input type="checkbox" name="P4"> Delete
            <input type="file" class="form-control-file" name="Picture_4" accept="image/png,image/jpeg">
            <small class='form-text text-danger'> Note: Size of Picture should be 600x600</small>
          </div>
        </div>
        </br>
        <div class="row">
          <div class="col-3">            
            <label class='text-primary'>Picture-5</label>
            </br>
            <img src="<?php echo e($data[0]->Picture_5); ?>" alt="No Image" height=100 width=100>
            <input type="checkbox" name="P5"> Delete
            <input type="file" class="form-control-file" name="Picture_5" accept="image/png,image/jpeg">
            <small class='form-text text-danger'> Note: Size of Picture should be 600x600</small>
          </div>
          <div class="col-3">            
            <label class='text-primary'>Picture-6</label>
            </br>      
            <img src="<?php echo e($data[0]->Picture_6); ?>" alt="No Image" height=100 width=100>
            <input type="checkbox" name="P6"> Delete
            <input type="file" class="form-control-file" name="Picture_6" accept="image/png,image/jpeg">
            <small class='form-text text-danger'> Note: Size of Picture should be 600x600</small>
          </div>
        </div>
        </br>
        <input type="hidden" name="nothing" value="nothing">
        <button type="submit" class="btn btn-block btn-lg btn-success">Submit</button>  			
		</form>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin-main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>