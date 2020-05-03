@extends('layouts.admin-main')

@section('title')
	<title>Add | Category</title>
@endsection

@section('middle')
	<div class="container bg-dark text-white rounded">
		<div class="row mt-2">
		  <div class="col-12 pt-1">
		    <h4 class="text-center">Add New Category Step 2<a href="/admin/add-category-step1" class=" float-right btn btn-danger btn-sm"><i class="fas fa-backward"> Back</i></a></h4>
		  </div>          
		</div>
	</div>

	
	<div class="container text-white mt-4 border border-info rounded-top border-bottom-0">
		<div class="row">			
			<div class="col-sm-3">
				Parent Catagory <input type="text" class="form-control form-control-sm" name="category" value="<?php if($cat != "x155x")echo $cat; ?>" readonly>
			</div>
			<div class="col-sm-3">
				Child Catagory <input type="text" class="form-control form-control-sm" name="table_name" value="{{ ucwords($tab)}}" readonly>
			</div>
			<div class="col-sm-2">
				Add More Properties <input type="number" class="form-control form-control-sm" id="how" min=1 max=30>
			</div>
			<div class="col-sm-1">
				<button class="btn btn-warning btn-sm mt-4" id="add">Add</button>
			</div>
			<div class="col-sm-3">
				<input class="mt-4 form-control form-control-sm text-danger font-weight-bold font-italic text-center " id="wrong" readonly>
			</div>
		</div>
	</div>

	<form method="POST">
	<div class="container mb-2 border border-info rounded-bottom border-top-0">		
		<div class="row">
			<div class="col-3 mt-3">
				<input type="text" class="form-control form-control-sm" value="Id" readonly>
			</div>
			<div class="col-5 mt-3">				
				<input type="radio" class="ml-2" value="text" disabled>Text
				<input type="radio" class="ml-2" value="number" checked disabled>Number
				<i class="ml-2 fas fa-ellipsis-v"></i>
				<input type="checkbox" class="ml-2" value="required" checked disabled>Must Fillup
				<i class="ml-2 fas fa-ellipsis-v"></i>
				<input type="checkbox" class="ml-2" disabled>Use as Filter
			</div>
			<div class="col-4 mt-3">
				<input type="text" class="form-control form-control-sm" value="101" readonly>
			</div>			
		</div>

		<div class="row">
			<div class="col-3 mt-3">
				<input type="text" class="form-control form-control-sm" value="Title" readonly>
			</div>
			<div class="col-5 mt-3">				
				<input type="radio" class="ml-2" value="text" checked disabled>Text
				<input type="radio" class="ml-2" value="number" disabled>Number
				<i class="ml-2 fas fa-ellipsis-v"></i>
				<input type="checkbox" class="ml-2" value="required" checked disabled>Must Fillup
				<i class="ml-2 fas fa-ellipsis-v"></i>
				<input type="checkbox" class="ml-2" value="filter" disabled>Use as Filter
			</div>
			<div class="col-4 mt-3">
				<input type="text" class="form-control form-control-sm bg-info border-info text-white" min=1 max=150 placeholder="Insert Dummy Data" name="dummy_data_title" required>
			</div>			
		</div>

		<div class="row">
			<div class="col-3 mt-3">
				<input type="text" class="form-control form-control-sm" value="Brand" readonly>
			</div>
			<div class="col-5 mt-3">				
				<input type="radio" class="ml-2" value="text" checked disabled>Text
				<input type="radio" class="ml-2" value="number" disabled>Number
				<i class="ml-2 fas fa-ellipsis-v"></i>
				<input type="checkbox" class="ml-2" value="required" checked disabled>Must Fillup
				<i class="ml-2 fas fa-ellipsis-v"></i>
				<input type="checkbox" class="ml-2" value="filter" name="filter_brand">Use as Filter
			</div>
			<div class="col-4 mt-3">
				<input type="text" class="form-control form-control-sm bg-info border-info text-white" min=1 max=150 placeholder="Insert Dummy Data" name="dummy_data_brand" required>
			</div>			
		</div>

		<div class="row">
			<div class="col-3 mt-3">
				<input type="text" class="form-control form-control-sm" value="Model" readonly>
			</div>
			<div class="col-5 mt-3">				
				<input type="radio" class="ml-2" value="text" checked disabled>Text
				<input type="radio" class="ml-2" value="number" disabled>Number
				<i class="ml-2 fas fa-ellipsis-v"></i>
				<input type="checkbox" class="ml-2" value="required" checked disabled>Must Fillup
				<i class="ml-2 fas fa-ellipsis-v"></i>
				<input type="checkbox" class="ml-2" value="filter" disabled>Use as Filter
			</div>
			<div class="col-4 mt-3">
				<input type="text" class="form-control form-control-sm bg-info border-info text-white" min=1 max=150 placeholder="Insert Dummy Data" name="dummy_data_model" required>
			</div>			
		</div>

		<div class="row">
			<div class="col-3 mt-3">
				<input type="text" class="form-control form-control-sm" value="Warranty" readonly>
			</div>
			<div class="col-5 mt-3">				
				<input type="radio" class="ml-2" value="text" checked disabled>Text
				<input type="radio" class="ml-2" value="number" disabled>Number
				<i class="ml-2 fas fa-ellipsis-v"></i>
				<input type="checkbox" class="ml-2" value="required" checked disabled>Must Fillup
				<i class="ml-2 fas fa-ellipsis-v"></i>
				<input type="checkbox" class="ml-2" value="filter" name="filter_warranty">Use as Filter
			</div>
			<div class="col-4 mt-3">
				<input type="text" class="form-control form-control-sm bg-info border-info text-white" min=1 max=150 name="dummy_data_warranty" placeholder="Insert Dummy Data" required>
			</div>			
		</div>

		<div class="row">
			<div class="col-3 mt-3">
				<input type="text" class="form-control form-control-sm" value="Quantity" readonly>
			</div>
			<div class="col-5 mt-3">				
				<input type="radio" class="ml-2" value="text" disabled>Text
				<input type="radio" class="ml-2" value="number" checked disabled>Number
				<i class="ml-2 fas fa-ellipsis-v"></i>
				<input type="checkbox" class="ml-2" value="required" checked disabled>Must Fillup
				<i class="ml-2 fas fa-ellipsis-v"></i>
				<input type="checkbox" class="ml-2" value="filter" disabled>Use as Filter
			</div>
			<div class="col-4 mt-3">
				<input type="text" class="form-control form-control-sm" min=1 max=150 value="1000" readonly>
			</div>			
		</div>

		<div class="row">
			<div class="col-3 mt-3">
				<input type="text" class="form-control form-control-sm" value="Price" readonly>
			</div>
			<div class="col-5 mt-3">				
				<input type="radio" class="ml-2" value="text" disabled>Text
				<input type="radio" class="ml-2" value="number" checked disabled>Number
				<i class="ml-2 fas fa-ellipsis-v"></i>
				<input type="checkbox" class="ml-2" value="required" checked disabled>Must Fillup
				<i class="ml-2 fas fa-ellipsis-v"></i>
				<input type="checkbox" class="ml-2" value="filter" disabled>Use as Filter
			</div>
			<div class="col-4 mt-3">
				<input type="text" class="form-control form-control-sm" min=1 max=150 value="4800" readonly>
			</div>			
		</div>

		<div class="row">
			<div class="col-3 mt-3">
				<input type="text" class="form-control form-control-sm" value="Picture" readonly>
			</div>
			<div class="col-5 mt-3">				
				<input type="radio" class="ml-2" value="" checked disabled>PNG
				<input type="radio" class="ml-2" value="" checked disabled>JPEG
				<i class="ml-4 fas fa-ellipsis-v"></i>
				<input type="checkbox" class="ml-2" value="required" checked disabled>Must Fillup
				<i class="ml-2 fas fa-ellipsis-v"></i>
				<input type="checkbox" class="ml-2" value="filter" disabled>Use as Filter
			</div>
			<div class="col-4 mt-3">
				<input type="text" class="form-control form-control-sm" min=1 max=150 readonly>
			</div>			
		</div>
		@for($i=1; $i<=$np; $i++)
		<div class="row">
			<div class="col-3 mt-3">
				<input type="text" class="form-control form-control-sm bg-info text-white border-info" maxlength=20 name="{{'column_name'.$i}}" placeholder="Property-{{$i}}" required>
			</div>
			<div class="col-5 mt-3">				
				<input type="radio" class="ml-2" name="{{'column_type'.$i}}" value="text" checked>Text
				<input type="radio" class="ml-2" name="{{'column_type'.$i}}" value="number">Number
				<i class="ml-2 fas fa-ellipsis-v"></i>
				<input type="checkbox" class="ml-2" name="{{'required'.$i}}" value="required">Must Fillup
				<i class="ml-2 fas fa-ellipsis-v"></i>
				<input type="checkbox" class="ml-2" name="{{'filter'.$i}}" value="filter">Use as Filter
			</div>
			<div class="col-4 mt-3">
				<input type="text" class="form-control form-control-sm bg-info text-white border-info" name="{{'dummy_data'.$i}}" maxlength=150 placeholder="Dummy Data" required>
			</div>			
		</div>
		@endfor
		<input type="hidden" id="temp" name="loopCount" value={{$np+1}}>
		<button type="submit" class="btn btn-success btn-lg btn-block my-3">Submit</button>
	</div>
	</form>

@endsection

@section('script')
	<script>
		$(document).ready(function(){
					var extraAdd = <?php echo 30-$np; ?>;
					var count = <?php echo $np+1 ?>;			
					$('#add').click(function(){				 
						if($('#how').val() <= extraAdd && $('#how').val() > 0)
						{
							$.ajax({
								url:"/test/2",
								method:"POST",
								data:{count:count, loop:$('#how').val()},
								success: function(result){
									extraAdd = extraAdd-$('#how').val();		
									count = count + parseInt($('#how').val());
									//console.log(result);
									$("#temp").val(count);
									$('#wrong').val('Added');
									$('#temp').before(result);
								}
							});
							
						}
						else if($('#how').val() <= 0)
						{
							$('#wrong').val('Are you kidding with me?');
						}
						else
						{
							$('#wrong').val('You can have 30 properties');
						}
					});
		});

	</script>
@endsection