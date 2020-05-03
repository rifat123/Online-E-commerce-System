<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\CustomClass\Header;
use Cart;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
    	$add = Cart::add(array(
    	    'id' => "$request->pid",
    	    'name' => "$request->title",    	    
    	    'price' => $request->price,
    	    'quantity' => $request->quantity,
    	    'attributes' => array('picture'=>"$request->picture")
    	));
    	echo $request->picture;
    }

    /*public function lol()
    {
    	dd(Cart::getContent()->toArray());
    	  Cart::clear(); 
    }
*/
    public function showCart()
    {
    	//category part
		$header = new Header();
		$category = $header->category();

    	$cartCollection = Cart::getContent();
    	$cartCollection = $cartCollection->toArray();
    	$subTotal = Cart::getSubTotal();
    	//dd($cartCollection);
    	return view('cart',compact('category','cartCollection','subTotal'));
    }

    public function removeFromCart($id)
    {
    	Cart::remove("$id");
    	return back();
    }

    public function updateCart(Request $request)
    {
    	
    	Cart::update("$request->pid", array(
    	  'quantity' => array(
    	        'relative' => false,
    	        'value' => $request->quantity
    	    )
    	));

    	$total = Cart::getSubTotal();
    	$arr = ["$request->quantity", "$total"];
    	return  response()->json($arr);
    }
}
