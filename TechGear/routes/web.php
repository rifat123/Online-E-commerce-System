<?php

Route::get('/', 'HomeController@showHome');
Route::get('/home', 'HomeController@showHome');
Route::get('/note/{id}', 'HomeController@showNote');

Route::get('/registration', 'RegistrationController@showRegistration');
Route::post('/registration', 'RegistrationController@submitRegistration');

Route::get('/login', 'LoginController@showLogin')->name('login');
Route::post('/login', 'LoginController@submitLogin');

Route::middleware('admin')->group(function(){

	Route::get('/admin/home', 'AdminController@showAdminHome');
	Route::get('/admin/account', 'AdminController@showAdminAccount');
	Route::post('/admin/account', 'AdminController@verifyAdminAccount');
	Route::get('/admin/logout', 'AdminController@adminLogout');

	Route::get('/admin/category/{opt}', 'AdminController@showCategoryList');

	Route::get('/admin/add-category-step1', 'AdminController@showAddCategoryStep1');
	Route::post('/admin/add-category-step1', 'AdminController@verifyAddCategoryStep1');
	Route::get('/admin/add-category-step2/{cat}/{tab}/{np}', 'AdminController@showAddCategoryStep2');
	Route::post('/admin/add-category-step2/{cat}/{tab}/{np}', 'AdminController@verifyAddCategoryStep2');

	Route::get('/admin/home-control', 'AdminController@showAdminHomeControl');
	Route::get('/admin/home-control/add-data/{scs}', 'AdminController@showAddDataToScsStep1');
	Route::get('/admin/home-control/add-data/{scs}/{table}', 'AdminController@showAddDataToScsStep2');
	Route::post('/admin/home-control/add-data/{scs}/{table}', 'AdminController@verifyAddDataToScsStep2');
	Route::get('/admin/home-control/add-data/slider/{table}/{id}', 'AdminController@showAddDataToSliderStep3');
	Route::post('/admin/home-control/add-data/slider/{table}/{id}', 'AdminController@verifyAddDataToSliderStep3');
	Route::get('/admin/home-control/add-data-to/static/{opt}', 'AdminController@showAddDataToStaticStep3');
	Route::post('/admin/home-control/add-data-to/static/{opt}', 'AdminController@verifyAddDataToStaticStep3');
	Route::get('/admin/home-control/delete-data/{scs}', 'AdminController@deleteDataOfScs');
	Route::post('/admin/home-control/delete-data/{scs}', 'AdminController@verifyDeleteDataOfScs');

	Route::get('/admin/user-control', 'AdminController@showAdminUserControl');
	Route::post('/admin/user-control', 'AdminController@deleteUser');
	Route::get('/admin/user-control/add-user', 'AdminController@addUser');
	Route::post('/admin/user-control/add-user', 'AdminController@verifyAddUser');
	Route::get('/admin/user-control/edit/{id}', 'AdminController@showAdminUserControlEdit');
	Route::post('/admin/user-control/edit/{id}', 'AdminController@verifyAdminUserControlEdit');

	Route::get('/admin/product-control/{opt}', 'AdminController@showAdminProductControl');
	Route::get('/admin/product-control/add-product/{table}', 'AdminController@showAddProduct');
	Route::post('/admin/product-control/add-product/{table}', 'AdminController@verifyAddProduct');

	Route::get('/admin/product-control/view-product/{table}', 'AdminController@viewProduct');
	Route::post('/admin/product-control/view-product/{table}', 'AdminController@deleteProduct');
	Route::get('/admin/product-control/edit/{table}/{id}', 'AdminController@editProduct');
	Route::post('/admin/product-control/edit/{table}/{id}', 'AdminController@verifyEditProduct');

	Route::get('/admin/qa/{opt}', 'AdminController@showQuestionAnswer');
	Route::post('/admin/qa/add-answer', 'AdminController@addAnswer');
	Route::post('/admin/qa/del-answer', 'AdminController@delAnswer');
	
	Route::get('admin/orders/active', 'AdminController@showActiveOrders');
	Route::post('admin/orders/active', 'AdminController@changeStatusOfOrders');
	Route::get('admin/orders/completed', 'AdminController@showCompletedOrders');
	Route::post('admin/orders/completed', 'AdminController@changeStatusOfOrders');
	Route::get('admin/orders/cancelled', 'AdminController@showCancelledOrders');
	Route::post('admin/orders/cancelled', 'AdminController@changeStatusOfOrders');
	Route::get('/admin/orders/{oid}', 'AdminController@showOrderDetails');
	
	Route::get('admin/account', 'AdminController@showAdminAccount');
});	


Route::get('/component/{table}', 'ComponentController@showComponent');
Route::get('/component/{table}/{id}', 'ComponentController@showComponentDetails');
Route::post('/component/{table}/{id}', 'ComponentController@askQuestion');
Route::post('/test/1', 'TestController@checkTest1'); // filter functionality
Route::post('/test/2', 'TestController@checkTest2');
Route::post('/test/3', 'TestController@checkTest3');
Route::post('/test/4', 'TestController@checkTest4');
Route::post('/test/5', 'TestController@checkTest5');


//Route::get('/cart/lol', 'CartController@lol');

Route::get('/cart', 'CartController@showCart');
Route::post('/cart/add', 'CartController@addToCart');
Route::get('/cart/remove/{id}', 'CartController@removeFromCart');
Route::post('/cart/update', 'CartController@updateCart');

Route::get('/compare', 'CompareController@showCompare');
Route::get('/compare/add/{table}/{id}', 'CompareController@addToCompare');
Route::get('/compare/remove/{table}/{id}', 'CompareController@removeFromCompare');

Route::middleware('user')->group(function(){

	Route::get('/user/home', 'UserController@showUserHome');	
	Route::get('/user/edit-account', 'UserController@showEditAccount');
	Route::post('/user/edit-account', 'UserController@verifyEditAccount');
	Route::get('/user/password', 'UserController@showChangePassword');
	Route::post('/user/password', 'UserController@verifyChangePassword');
	Route::get('/user/address-book', 'UserController@showAddressBook');
	Route::post('/user/address-book', 'UserController@deleteAddress');
	Route::get('/user/address-book/{opt}/{id}', 'UserController@editAddress');
	Route::post('/user/address-book/{opt}/{id}', 'UserController@verifyEditAddress');
	
	Route::get('/user/add-address/{opt}', 'UserController@addAddress');
	Route::post('/user/add-address/{opt}', 'UserController@verifyAddAddress');	
	
	//Route::get('/user/cart', 'UserController@showCart');
	Route::get('/user/order-history', 'UserController@showOrderHistory');
	Route::get('/user/my-question', 'UserController@showMyQuestion');
	Route::get('/user/rating-review', 'UserController@showRatingReview');
	Route::post('/user/rating-review', 'UserController@saveRatingReview');
	Route::get('/user/logout', 'UserController@userLogout');

	Route::get('/user/wishlist', 'UserController@showWishlist');
	Route::get('/user/add-to-wishlist/{table}/{pid}', 'UserController@addToWishlist');
	Route::get('/user/delete-from-wishlist/{id}', 'UserController@deleteFromWishlist');
	Route::get('/user/wishlist-to-cart/{id}/{table}/{pid}', 'UserController@wishlistToCart');
	
	Route::get('/user/cart/checkout', 'UserController@checkout');
	Route::post('/user/cart/checkout', 'UserController@verifyCheckout');
	
});


