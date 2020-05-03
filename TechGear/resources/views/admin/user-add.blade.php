@extends('layouts.admin-main')

@section('middle')
	
	<div class="container">
		<div class="row mt-4">
        <div class="col-12 pt-1">
            <h4 class="text-center text-danger">Add New User<a href="/admin/home" class=" float-right btn btn-danger btn-sm"><i class="fas fa-backward"> Back</i></a></h4>
        </div>          
    </div>
		
		@if ($errors->any())
    	<div class="alert alert-danger">
        	<ul>
            	@foreach ($errors->all() as $error)
                	<li>{{ $error }}</li>
            	@endforeach
        	</ul>
    	</div>
		@endif

    <?php 
    if(isset($emailExist)){
    ?>
      <div class="alert alert-danger">
        <?php echo $emailExist; ?>
      </div>
    <?php
    }
    ?>

		<form method="POST">
  			<div class="form-group">
    			<label class="text-primary">Full Name<i class="h5 text-danger"> ****</i></label>
    			<input type="text" class="form-control" name="name" required ">
    			<small class="form-text text-danger">Max Length of Full Name with Space is 20 character</small>
  			</div>
  			<div class="form-group">
    			<label class="text-primary">Email<i class="h5 text-danger"> ****</i></label>
    			<input type="email" class="form-control" name="email" required ">
    			<small class="form-text text-danger">Max Length is 30</small>
  			</div>
  			<div class="form-group">
    			<label class="text-primary">Password<i class=" h5 text-danger"> ****</i></label>
    			<input type="text" class="form-control" name="password" required ">
    			<small class="form-text text-danger">Minimum Length is 5 & Max Length is 15 </small>
  			</div>
  			<div class="form-group">
    			<label class="text-primary">Address</label>
    			<input type="text" class="form-control" name="address" ">
  			</div>
  			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
@endsection