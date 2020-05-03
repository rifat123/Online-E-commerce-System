@extends('layouts.admin-main')

@section('middle')
	<div class="container">
        <div class="row mt-4">
            <div class="col-12 pt-1">
                <h4 class="text-center text-danger">Add an Image For <?php echo ucfirst($scs);?><a href="/admin/home-control/add-data/<?php echo $scs; ?>/<?php echo $table; ?>" class=" float-right btn btn-danger btn-sm"><i class="fas fa-backward"> Back</i></a></h4>
            </div>          
        </div>
    	</br>    	
    	<div class="row">
    		<div class="col-7 bg-dark p-5 offset-1">   			
    			@foreach($data as $d)
    			<h6 class="text-white">Title: {{$d->Title}}</h6>
    			<h6 class="text-white mb-3">Brand: {{$d->Brand}}</h6>
    			@endforeach
    			
    			<form method="POST" enctype="multipart/form-data">
    				<div class="text-success" style="width:220px">
                        <h5 class="text-danger mb-0">****</h5>
    					<input type="file" class="form-control-file" name="picture" accept="image/png,image/jpeg" required>
    				</div>
    				<small class="form-text text-warning">File type should be JPEG or PNG and size should be 1120x350</small>
    				</br>
    				<div>
    					<button type="submit" class="btn btn-success">Upload</button>
    				</div>
    			</form>

    			@if ($errors->any())
    			</br>
    			<div>
       				@foreach ($errors->all() as $error)
               		<h6 class="text-danger">{{ $error }}</h6>
            		@endforeach
        			
        		</div>
    			@endif
    		</div>
    		<div class="col-3 p-1 bg-dark">
    			@foreach($data as $d)
    			<image src="{{$d->Picture_1}}" class="img-fluid">
    			@endforeach
    		</div>
    	</div>
	</div>
@endsection