@extends('layouts.admin-main')

@section('title')
	<title>Add | Category</title>
@endsection

@section('middle')
	<div class="container">
		<div class="row mt-2 mb-3">
		  <div class="col-12 pt-1">
		    <a href="/admin/home" class=" float-right btn btn-danger btn-sm"><i class="fas fa-backward"> Back</i></a>
		  </div>          
		</div>

		<div class="mx-auto px-4 py-4 border border-primary rounded bg-dark" style="width:400px">
			<h4 class="text-center text-white">Add New Category Step 1</h4></br>
			<form method="POST">
		  		<div class="form-group">
		    		<label class="text-white">Parent Category</label>
		    		<input type="text" class="form-control" name="category" autocomplete="off" value="{{ old('category') }}" list="categoryList" maxlength=20>		    
		  			<datalist id="categoryList">
		  				@foreach($category as $cat)
		  				<a href="/lol"><option value="{{$cat->Category}}"></a>
		  				@endforeach
		  			</datalist>
		  		</div>
		  		
		  		<div class="form-group">
		    		<label class="text-white">Child Category<i class="h5 text-info"> ****</i></label>
		    		<input type="text" class="form-control" name="table_name" value="{{ old('table_name') }}" maxlength=20 required>
		    		@if (session('wrongCat'))
		    		<small class="form-text text-danger font-weight-bold"><i class="fas fa-info-circle"> {{ session('wrongCat') }}</i></small>    		
		    		@else
		    		<small class="form-text text-info">This field should be unique</small>
		    		@endif
		  		</div>
		  		<div class="form-group">
		    		<label class="text-white">Number of Properties<i class="h5 text-info"> ****</i></label>
		    		<input type="number" class="form-control" name="num_properties" value="{{ old('num_properties') }}" min=1 max=30 required>
		    		<small class="form-text text-info"><span class=" font-weight-bold font-italic">Id, Title, Brand, Model, Warranty, Quantity, Price, Prictures</span> are the default properties. No need to add these.</small>
		  		</div>		  
		  		<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div> 
@endsection