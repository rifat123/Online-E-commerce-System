@extends('layouts.admin-main')

@section('title')
	<title>Admin | Home</title>
@endsection

@section('middle')	
	<div class="container px-0">
		<h4 class="text-white text-center bg-secondary pb-2">ADMIN: <?php echo strtoupper(session()->get('name')); ?></h4>
    @if (session('msg'))
    <div class="text-center alert-success">
      {{ session('msg') }}
    </div>
    @endif

		<div class="row mx-0 mt-4">		
			<div class="card text-white bg-secondary mb-3 mr-4" style="width:22.7rem;">
  				<div class="card-header h5">CATEGORY CARD</div>
  				<div class="card-body pb-2 pr-5">  	
    				<h6 class="card-title text-warning"><a href="/admin/add-category-step1" class="text-warning" style="text-decoration:none">ADD NEW CATEGORY</a></h6>
    			  	<h6 class="card-title text-warning">
    					<a href="/admin/category/enabled" class="text-warning" style="text-decoration:none">ENABLED CATEGORY<span class="text-white float-right">{{$data['enabledCategory121']}}</span></a>
    				</h6>
    			  	<h6 class="card-title text-warning">
    					<a href="/admin/category/disabled" class="text-warning" style="text-decoration:none">DISABLED CATEGORY<span class="text-white float-right">{{$data['disabledCategory121']}}</span></a>
    				</h6>	
  				</div>
			</div>

			<div class="card text-white bg-secondary mb-3 mr-4" style="width:22.7rem;">
  				<div class="card-header h5">SCS CARD</div>
  				<div class="card-body pb-2 pr-5">  	
    				<h6 class="card-title text-warning">
    					<a href="/admin/home-control/add-data/slider" class="text-warning" style="text-decoration:none">ADD TO SLIDER</a>
    					<a href="/admin/home-control/delete-data/slider" class="text-white float-right" style="text-decoration:none">{{$data['slider121']}}</a>
    				</h6>   			  	
    			 	<h6 class="card-title text-warning">
    					<a href="/admin/home-control/add-data/collection" class="text-warning" style="text-decoration:none">ADD TO COLLECTION</a>
    					<a href="/admin/home-control/delete-data/collection" class="text-white float-right" style="text-decoration:none">{{$data['collection121']}}</a>
    				</h6>
    				<h6 class="card-title text-warning">
    					<a href="/admin/home-control/add-data/static" class="text-warning" style="text-decoration:none">ADD TO STATIC</a>
    					<a href="/admin/home-control/delete-data/static" class="text-white float-right" style="text-decoration:none">{{$data['static121']}}</a>
    				</h6>
    				<h6 class="card-title text-warning">
    					<a href="/admin/home-control/add-data-to/static/note" class="text-warning" style="text-decoration:none">ADD TO NOTE</a>
    					<a href="/admin/home-control/delete-data/static note" class="text-white float-right" style="text-decoration:none">{{$data['note121']}}</a>
    				</h6>
  				</div>
			</div>

			<div class="card text-white bg-secondary mb-3" style="width:22.7rem;">
  				<div class="card-header h5">USERS CARD</div>
  				<div class="card-body pb-2 pr-5">  	
    				<h6 class="card-title text-warning"><a href="/admin/user-control/add-user" class="text-warning" style="text-decoration:none">ADD NEW USER</a></h6>
    			  	<h6 class="card-title text-warning">
    					<a href="/admin/user-control" class="text-warning" style="text-decoration:none">EDIT USER</a>
    				</h6>
    			  	<h6 class="card-title text-warning">
    					<a href="/admin/user-control" class="text-warning" style="text-decoration:none">DELETE USER</a>
    				</h6>	
  				</div>
			</div>
		</div>

		<div class="row mx-0 mt-5">		
			<div class="card text-white bg-secondary mb-3 mr-3" style="width:17rem;">
  				<div class="card-header h5">ORDERS CARD</div>
  				<div class="card-body pb-2 pr-3">   				
    			  	<h6 class="card-title text-warning">
    					<a href="/admin/orders/active" class="text-warning" style="text-decoration:none">ORDER ACTIVE<span class="text-white float-right">{{$data['activeOrders121']}}</span></a>
    				</h6>
    			  <h6 class="card-title text-warning">
    					<a href="/admin/orders/completed" class="text-warning" style="text-decoration:none">ORDER COMPLETED<span class="text-white float-right">{{$data['completedOrders121']}}</span></a>
    				</h6>
            <h6 class="card-title text-warning">
              <a href="/admin/orders/cancelled" class="text-warning" style="text-decoration:none">ORDER CANCELLED<span class="text-white float-right">{{$data['cancelledOrders121']}}</span></a>
            </h6>	
  				</div>
			</div>

			<div class="card text-white bg-secondary mb-3 mr-3" style="width:17rem;">
  				<div class="card-header h5">QUESTIONS CARD</div>
  				<div class="card-body pb-2 pr-3">  	
    				<h6 class="card-title text-warning">
    					<a href="/admin/qa/new" class="text-warning" style="text-decoration:none">NEW QUESTIONS</a>
    					<a href="/admin/home-control/delete-data/slider" class="text-white float-right" style="text-decoration:none">{{$data['newQuestions121']}}</a>
    				</h6>   			  	
    			 	<h6 class="card-title text-warning">
    					<a href="/admin/qa/answered" class="text-warning" style="text-decoration:none">ALREADY ANSWERED</a>
    					<a href="/admin/home-control/delete-data/collection" class="text-white float-right" style="text-decoration:none">{{$data['alreadyAnswered121']}}</a>
    				</h6>
    				<h6 class="card-title text-warning">
    					<a href="/admin/qa/all" class="text-warning" style="text-decoration:none">TOTAL QUESTIONS</a>
    					<a href="/admin/home-control/delete-data/static" class="text-white float-right" style="text-decoration:none">{{$data['totalQuestions121']}}</a>
    				</h6>
  				</div>
			</div>

			<div class="card text-white bg-secondary mb-3 mr-3" style="width:17rem;">
  				<div class="card-header h5">SALES REPORT<span class="text-white float-right">TK</span></a></div>
  				<div class="card-body pb-2 pr-3">  	
    				<h6 class="card-title text-warning"><a class="text-warning" style="text-decoration:none">THIS MONTH<span class="text-white float-right">{{$data['thisMonth121']}}</span></a></h6>
    			  	<h6 class="card-title text-warning">
    					<a class="text-warning" style="text-decoration:none">FEBRUAR<span class="text-white float-right">{{$data['lastMonth121']}}</span></a>
    				</h6>
    			  	<h6 class="card-title text-warning">
    					<a class="text-warning" style="text-decoration:none">JANUARY<span class="text-white float-right">{{$data['lastOfLastMonth121']}}</span></a>
    				</h6>
    				<h6 class="card-title text-warning">
    					<a class="text-warning" style="text-decoration:none">TOTAL SALES<span class="text-white float-right">{{$data['totalSales121']}}</span></a>
    				</h6>	
  				</div>
			</div>

			<div class="card text-white bg-secondary mb-3" style="width:17rem;">
  				<div class="card-header h5">PRODUCTS CARD</div>
  				<div class="card-body pb-2 pr-3">  	
    				<h6 class="card-title text-warning"><a href="/admin/product-control/add-product" class="text-warning" style="text-decoration:none">ADD NEW PRODUCTS</a></h6>
    			  	<h6 class="card-title text-warning">
    					<a href="/admin/product-control/vud-product" class="text-warning" style="text-decoration:none">VIEW PRODUCTS</a>
    				</h6>	
  				</div>
			</div>
		</div>	
	</div>   
@endsection