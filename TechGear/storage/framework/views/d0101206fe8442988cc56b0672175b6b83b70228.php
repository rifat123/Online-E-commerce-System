<?php $__env->startSection('title'); ?>
	<title>My Address Book</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
	<h5 class="text-center">Address Book Entries <a href="/user/add-address/ab" class="btn btn-sm btn-info float-right">New Address</a></h5>
	</br>
	<table class="table table-bordered">
		<tbody>
			<?php $__currentLoopData = $address; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ua): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	    	<tr style="font-size:13.5px">
	      		<td>
	      			<?php 
	      				if($ua->name != null) {echo"$ua->name</br>";}
	      				if($ua->company != null) {echo"$ua->company</br>";}
	      				if($ua->address_1 != null) {echo"$ua->address_1</br>";}
	      				if($ua->address_2 != null) {echo"$ua->address_2</br>";}
	      				if($ua->thana != null) {echo"$ua->thana</br>";}
	      				if($ua->district != null) {echo"$ua->district</br>";}
	      				if($ua->division != null) {echo"$ua->division</br>";}
	      				if($ua->post_code != null) {echo"$ua->post_code";}
	      			?>
	      		</td>
	      		<td>
	      			<?php if($ua->default_address != null): ?>
	      			Default Shipping Address
	      			<?php endif; ?>
	      		</td>
	      		<td>
	      			<a href="/user/address-book/ab/<?php echo e($ua->id); ?>" class="btn btn-sm btn-primary">Edit</a>
      				<button type="button" class="btn btn-sm btn-danger btn-del" value="<?php echo e($ua->id); ?>" data-toggle="modal" data-target="#myModal">Delete</button>
	      		</td>
	    	</tr>
	    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>

	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header justify-content-center">
            <h4 class="modal-title" id="myModalLabel">Are You Sure Delete the Address</h4>
          </div>
          <form action="/user/address-book" method="post">
            <div class="modal-footer">
              <input type="hidden" id="address-id" name="aid" value="">
              <button type="button" class="btn btn-primary" data-dismiss="modal">No, Cancel</button>
              <button type="submit" class="btn btn-danger">Yes, Delete</button>
            </div>
          </form>
        </div>
      </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
	<script>
      $(document).ready(function(){
        $('.btn-del').click(function(){
          $("#address-id").val($(this).val());
          //console.log($(this).val());
        });
      });
  </script>>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user-main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>