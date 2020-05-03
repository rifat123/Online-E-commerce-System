<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php echo $__env->yieldContent('title'); ?>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!-- <link href="/css/prettyPhoto.css" rel="stylesheet">
    <link href="/css/price-range.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
	<link href="/css/main.css" rel="stylesheet">
	<link href="/css/responsive.css" rel="stylesheet">  
	<link href="/css/app.css" rel="stylesheet">  
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png"> -->
    <style>.dropright:hover>.dropdown-menu{display:block}</style>
    <style>input[type=number]::-webkit-inner-spin-button{opacity:1}</style>
    <?php echo $__env->yieldContent('script-head'); ?>
</head><!--/head-->

<body class="bg-white">
	<header id="header"><!--header-->
		<div class="header_top" style="background-color:gainsboro"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-6">						
						<ul class="nav">
							<li class="nav-item"><i class="fas fa-phone nav-link disabled">+88 01685764208</i></li>
							<li class="nav-item"><i class="fas fa-envelope nav-link disabled">info@domain.com</i></li>
						</ul>						
					</div>
					<div class="col-6">
						<ul class="nav justify-content-end">							
							<?php if(!Session::has('email')): ?>
						 	<li class="nav-item">
						    	<a class="nav-link btn-sm" href="/registration"><i class="fas fa-user"> Register</i></a>
						  	</li>
						  	<li class="nav-item">
						    	<a class="nav-link btn-sm" href="/login"><i class="fas fa-lock"> Login</i></a>
						  	</li>
						  	<?php endif; ?>
						  	<?php if(Session::get('type') != "admin"): ?>
						  	<li class="nav-item">
						    	<a class="nav-link btn-sm text-danger" href="/cart"><i class="fas fa-shopping-cart"> Cart(<?php echo e(count($cartCollection)); ?>)</i></a>
						  	</li>
						  	<?php if(Session::get('type') == "user"): ?>
						  	<li class="nav-item">
						    	<a class="nav-link btn-sm" href="/user/wishlist"><i class="fas fa-heart"> Wishlist</i></a>
						  	</li>
						  	<?php else: ?>
						  	<li class="nav-item">
						    	<a class="nav-link btn-sm" href="/login"><i class="fas fa-heart"> Wishlist</i></a>
						  	</li>
						  	<?php endif; ?>
						  	<?php else: ?>
						  	<li class="nav-item">
						    	<a class="nav-link btn-sm" href="/admin/home"><i class="fas fa-home"> Admin-Panel</i></a>
						  	</li>
						  	<li class="nav-item">
						    	<a class="nav-link btn-sm" href="/admin/logout"><i class="fas fa-sign-out-alt"> Logout</i></a>
						  	</li>
						  	<?php endif; ?>
						  	<li class="nav-item">
						    	<a class="nav-link btn-sm" href="/compare"><i class="fas fa-exchange-alt"> Compare</i></a>
						  	</li>
						  	<?php if(Session::get('type') == "user"): ?>
						  	<li class="nav-item">
						    	<a class="nav-link btn-sm" href="/user/home"><i class="fas fa-user"> Account</i></a>
						  	</li>
						  	<li class="nav-item">
						    	<a class="nav-link btn-sm" href="/user/logout"><i class="fas fa-sign-out-alt"> Logout</i></a>
						  	</li>	
						  	<?php endif; ?>					  
						</ul>					
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		</br>
		<div class="header-mid"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-3">						
						<a href="/home" class="h2"><i class="fas fa-home"> Tech Gear</i></a>						
					</div>	
					<div class="col-9">
						<div class="input-group ">							
							<select name="selected_category" id="selected_category" class="custom-select" style="max-width:16%;">
								<option value="all_category" selected>All Category</option>
								<?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php if(is_numeric($cat->Category)): ?>				
								<option value="<?php echo e($cat->Table_Name); ?>"><?php echo ucwords(str_replace('_',' ',$cat->Table_Name)); ?></option>
								<?php else: ?>
								<?php $new = explode("#",$cat->Table_Name); ?>
								<div class="btn-group dropright">				 	
									<option value="<?php echo e($cat->Category.'#'); ?>"><?php echo ucwords($cat->Category); ?></option>
									 	<div class="dropdown-menu ml-0" aria-labelledby="dropdownMenuButton">
									 		<?php $__currentLoopData = $new; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									 	   	<option value="<?php echo e($n); ?>">&nbsp&nbsp&nbsp&nbsp<?php echo ucfirst(str_replace('_',' ',$n)); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
										</div>
								</div>			
								<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>					
							</select>
							

							<input type="text" id="search" class="form-control" autocomplete="off" placeholder="Search Here">
							
							<!-- <div class="input-group-append">
							 	<button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
							</div> -->
						</div>
						<ul id="search_result" class="list-group" style="margin-left:130px; position:absolute; z-index:50; width:655px; max-height:350px; overflow: auto;"></ul>						
					</div>				
				</div>
			</div>
		</div><!--/header-middle-->
		</br>
		<div class="header-btm"><!--header-bottom-->
			<div class="container-fluid" style="padding-top:3px;padding-bottom:3px; background-color:black">
				<div class="container">				
					<?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php if(is_numeric($cat->Category)): ?>				
					<a href="/component/<?php echo strtolower($cat->Table_Name); ?>" class="btn text-white"><?php echo strtoupper(str_replace('_',' ',$cat->Table_Name)); ?></a>
					<?php else: ?>
					<?php $new = explode("#",$cat->Table_Name); ?>
					<div class="btn-group dropright">				 	
						<button class="btn dropdown-toggle text-white" type="button" data-toggle="dropdown"><?php echo strtoupper($cat->Category); ?></button>
						 	<div class="dropdown-menu ml-0" aria-labelledby="dropdownMenuButton">
						 		<?php $__currentLoopData = $new; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						 	   	<a class="dropdown-item" href="/component/<?php echo strtolower($n); ?>"><?php echo ucwords(str_replace('_',' ',$n)); ?></a>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
							</div>
					</div>			
					<?php endif; ?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>				
				</div>			
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->

	<?php echo $__env->yieldContent('middle'); ?>

	<footer id="footer" style="background-color:aliceblue"><!--Footer-->	
		<div class="container mt-5 pt-3">
			<div class="row">
				<div class="col-sm-3">
					<h4>Service</h4>					
					<a href="#" style="text-decoration:none">Online Help</a></br>
					<a href="#" style="text-decoration:none">Contact Us</a></br>
					<a href="#" style="text-decoration:none">Order Status</a></br>	
					<a href="#" style="text-decoration:none">FAQ's</a>					
				</div>
				
				<div class="col-sm-3">
					<h4>Policies</h4>					
					<a href="#" style="text-decoration:none">Terms of Use</a></br>
					<a href="#" style="text-decoration:none">Privecy Policy</a></br>
					<a href="#" style="text-decoration:none">Refund Policy</a></br>
					<a href="#" style="text-decoration:none">Billing System</a>					
				</div>
				<div class="col-sm-3">
					<h4>About us</h4>					
					<a href="#" style="text-decoration:none">Company Information</a></br>
					<a href="#" style="text-decoration:none">Careers</a></br>
					<a href="#" style="text-decoration:none">Store Location</a></br>			
					<a href="#" style="text-decoration:none">Copyright</a>					
				</div>
				<div class="col-sm-3">
					<h4>About Shopper</h4>
						<input type="text" class="form-control" placeholder="Your Email Address">
						<button type="" class="btn btn-sm btn-info mt-1 ml-0">Submit</i></button>
						<p>Get the most recent updates from <br/>our site and keep yourself updated</p>		
				</div>
			</div>
		</div>
		
		<div class="container">
			<div class="row">
				<p>Copyright © 2019 Tech Gear. All rights reserved.</p>			
			</div>
		</div>		
	</footer><!--/Footer-->
	
    <script src="/js/jquery.min.js"></script>
    <script src="/js/popper.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
<!--<script src="/js/jquery.scrollUp.min.js"></script>
	<script src="/js/price-range.js"></script>
    <script src="/js/jquery.prettyPhoto.js"></script>
    <script src="/js/main.js"></script> -->
    <?php echo $__env->yieldContent('script'); ?>

    <script>
    	$(document).ready(function(){

    		$('#search').keyup(function(){
    			search_fun($(this).val());
    		});

    		$("body").click(function() {
    		    $("#search_result").hide();
    		});

    		$("#search").click(function(e) {
    			e.stopPropagation();
    			search_fun($(this).val());
    			$("#search_result").show();  			
    		});    		
    		
    		function search_fun(search){
    			var selected_category = $('#selected_category').val();    			
    			//console.log(search);
    			if(search.length > 2)
    			{
    				$.ajax({
    					url:"/test/4",
    					method: "post",
    					data:{selected_category:selected_category, search:search},
    					success: function(data){
    						//console.log(data);
    						$('#search_result').html(data);
    					}
    				});
    			}
    			else
    			{
    				$('#search_result').html(' ');
    			}
    		}
    	});
    </script>
</body>
</html>