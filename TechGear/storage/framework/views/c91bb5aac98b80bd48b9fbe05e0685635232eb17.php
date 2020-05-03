<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">    
    <?php echo $__env->yieldContent('title'); ?>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <style>.dropdown:hover>.dropdown-menu{display:block}</style>
    <style>
        .dropdown-submenu {position:relative;}
        .dropdown-submenu .dropdown-menu {top:0; left:100%; margin-top:-1px;}
    </style>
</head>

<body>
    <div class="container-fluid py-2" style="background-color:black">
        <div class="container">   
            <div class="row">
                <div class="bg-primary">
                    <a href="/home" class="btn btn-primary btn-sm"><i class="fas fa-home"> Home</i></a>
                </div>
                <div class="bg-primary">
                    <div class="btn-group dropdown">
                        <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Category</button>
                        <div class="dropdown-menu mt-0" aria-labelledby="dropdownMenuButton">
                            <a href="/admin/add-category-step1" class="dropdown-item" href="#">Add Category</a>
                            <a href="/admin/category/all" class="dropdown-item" href="#">Category List</a>                            
                        </div>
                    </div>

                    <div class="btn-group dropdown">
                        <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Slider</button>
                        <div class="dropdown-menu mt-0" aria-labelledby="dropdownMenuButton">
                            <a href="/admin/home-control/add-data/slider" class="dropdown-item" href="#">Add Data To Slider</a>
                            <a href="/admin/home-control/delete-data/slider" class="dropdown-item" href="#">Delete Data Of Slider</a>                            
                        </div>
                    </div>

                    <div class="btn-group dropdown">
                        <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Collection</button>
                        <div class="dropdown-menu mt-0" aria-labelledby="dropdownMenuButton">
                            <a href="/admin/home-control/add-data/collection" class="dropdown-item" href="#">Add Data To Collection</a>
                            <a href="/admin/home-control/delete-data/collection" class="dropdown-item" href="#">Delete Data Of Collection</a>                            
                        </div>
                    </div>

                    <div class="btn-group dropdown">
                        <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Static</button>
                        <div class="dropdown-menu mt-0" aria-labelledby="dropdownMenuButton">                            
                            <a href="/admin/home-control/add-data/static" class="dropdown-item" href="#">Add Data To Static</a>
                            <a href="/admin/home-control/add-data-to/static/note" class="dropdown-item" href="#">Add Note To Static</a>
                            <a href="/admin/home-control/delete-data/static all" class="dropdown-item" href="#">Delete Data Of Static</a>                            
                        </div>
                    </div>
                </div>

                <div class="bg-secondary">                 
                    <a href="/admin/user-control/add-user" class="btn btn-secondary btn-sm">Add User</a>            
                    <a href="/admin/user-control" class="btn btn-secondary btn-sm">VUD User</a>            
                </div>

                <div class="bg-success">                    
                    <a href="/admin/product-control/add-product" class="btn btn-success btn-sm">Add Product</a>            
                    <a href="/admin/product-control/vud-product" class="btn btn-success btn-sm">VUD Product</a>            
                </div>

                <div class="bg-secondary">                    
                    <a href="/admin/qa/all" class="btn btn-secondary btn-sm">Question</a>            
                    <a href="/admin/orders/active" class="btn btn-secondary btn-sm">Orders</a>            
                </div>

                <div class="bg-info">                   
                    <a href="/admin/account" class="btn btn-info btn-sm"><i class="fas fa-cog"> Account</i></a>            
                    <a href="/admin/logout" class="btn btn-info btn-sm"><i class="fas fa-sign-out-alt"> Logout</i></a>            
                    <a href="/admin/home" class="btn btn-info btn-sm"><i class="fas fa-home"> Admin</i></a>            
                </div>                
            </div>            
        </div>
    </div>

    <?php echo $__env->yieldContent('middle'); ?>
    
    <script src="/js/jquery.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>    
    <?php echo $__env->yieldContent('script'); ?>
</body>
</html>