@extends('layouts.admin-main')

@section('title')
    <title>Add New Product</title>
@endsection

@section('middle')
    <div class="container">
  		<div class="row mt-2 mb-3">
        <div class="col-12 pt-1">
            <a href="/admin/home" class=" float-right btn btn-danger btn-sm"><i class="fas fa-backward"> Back</i></a>
        </div>
      </div>

      <div class="row mb-4">
        <div class="col-7 mx-auto pt-1 bg-dark rounded">
            <h4 class="text-center text-white"><?php if($show == "add-product"){echo "Add New Product";} else{echo "View, Update, Delete Product";} ?></h4>
        </div>
      </div>

      <div class="row" style="height:350px">
        @if($show == "add-product")
    		<div class="col-7 mx-auto bg-dark text-white px-4 border border-primary rounded">
      		  </br><h5 class="text-center mb-4 text-info">Select a Category</h5>
    			   @foreach($table as $t)
  				  <a href="/admin/product-control/add-product/{{$t->Table_Name}}" class="btn btn-sm btn-primary mb-2">{{ ucWords(str_replace('_', ' ', $t->Table_Name)) }}</a>
    			   @endforeach              
    		</div>
        

        @elseif($show == "vud-product")
    		<div class="col-7 mx-auto bg-dark text-white px-4 border border-primary rounded">
      			</br><h5 class="text-center mb-4 text-info">Select a Category</h5>
             @foreach($table as $t)
            <a href="/admin/product-control/view-product/{{$t->Table_Name}}" class="btn btn-sm btn-primary mb-2">{{ ucWords(str_replace('_', ' ', $t->Table_Name)) }}</a>
             @endforeach
    		</div>
        @endif
  		</div>

	</div>
@endsection