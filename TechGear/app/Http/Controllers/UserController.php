<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\CustomClass\Header;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UserEditRequest;
use App\Http\Requests\RegistrationRequest;
use App\Http\Requests\UserPasswordRequest;
use App\Http\Requests\AddressRequest;
use Illuminate\Support\Facades\Mail;
use Cart;
use App\Mail\Gmail;

class UserController extends Controller
{
    public function showUserHome()
    {
    	//category part
        $header = new Header();
        $category = $header->category();

        $cartCollection = Cart::getContent()->toArray();

        $email = session()->get('email');
        $account = DB::select("SELECT * FROM user WHERE email='$email'");

        $uid = session()->get('id');
        $address = DB::select("SELECT * FROM user_address WHERE uid=$uid AND default_address='yes' AND deleted IS NULL");

        $orders = DB::select("SELECT * FROM orders WHERE uid=$uid AND deleted IS NULL ORDER BY id DESC");
        //dd($orders);
        foreach($orders as $order)
        {
            $temp = DB::select("SELECT COUNT(*) as items FROM orders_products WHERE oid=$order->id AND deleted IS NULL");
            $order->items = $temp[0]->items;
        }
        
        return view('user.user-home',compact('category','cartCollection','account','address', 'orders'));
    }

    public function showEditAccount()
    {
        //category part
        $header = new Header();
        $category = $header->category();

        $cartCollection = Cart::getContent()->toArray();

        $id = session()->get('id');
        $result = DB::select("SELECT * FROM user WHERE id=?",[$id]);
        return view('user.user-edit-account',compact('category','cartCollection','result'));
    }

    public function verifyEditAccount(UserEditRequest $request)
    {
        session()->forget('old');
        session()->save();

        $query = "UPDATE user SET name='$request->name', email='$request->email', phone='$request->phone', fax='$request->fax' WHERE id=$request->uid";
        DB::update($query);
        return redirect('/user/home')->with('success', 'Successfully Updated');
    }

    public function showChangePassword()
    {
        //category part
        $header = new Header();
        $category = $header->category();

        $cartCollection = Cart::getContent()->toArray();

        return view('user.user-password',compact('category','cartCollection'));
    }

    public function verifyChangePassword(UserPasswordRequest $request)
    {
       $id = $request->session()->get('id');
       DB::update("UPDATE user SET password=? WHERE id=?",["$request->password", $id]);
       return redirect('/user/home')->with('success', 'Password Successfully Changed');
    }

    public function showAddressBook()
    {
        //category part
        $header = new Header();
        $category = $header->category();

        $cartCollection = Cart::getContent()->toArray();
        $id = session()->get('id');
        $address = DB::select("SELECT * FROM user_address WHERE uid=? AND Deleted IS NULL ORDER BY id DESC",[$id]);
        //dd($address);
        return view('user.user-address-book',compact('category','cartCollection','address'));
    }

    public function deleteAddress(Request $request)
    {
        $date = date('d-m-Y');
        $query = "UPDATE user_address SET Deleted='$date' WHERE id=$request->aid";
        DB::update($query);
        return back();
    }

    public function editAddress($opt, $id)
    {
        //category part
        $header = new Header();
        $category = $header->category();

        $cartCollection = Cart::getContent()->toArray();

        $uid = session()->get('id');
        $result = DB::select("SELECT * FROM user_address WHERE id=$id AND uid=$uid");
        
        return view('user.user-edit-address',compact('category', 'cartCollection','result','opt'));
    }

    public function verifyEditAddress($opt, $id, AddressRequest $request)
    {
        $uid = session()->get('id');
        DB::update("UPDATE user_address SET name=?, company=?, address_1=?, address_2=?, thana=?, district=?, division=?, country=?, post_code=?, default_address=? WHERE id=?",[$request->name, $request->company, $request->address_1, $request->address_2, $request->thana, $request->district, $request->division, $request->country, $request->post_code, $request->default_address, $id]);
        if($request->default_address != null)
        {
            DB::update("UPDATE user_address SET default_address=NULL WHERE uid=$uid");
            DB::update("UPDATE user_address SET default_address='yes' WHERE id=$id");
        }

        if($opt == "ab")
            return redirect('/user/address-book');
        if($opt == "check")
            return redirect('/user/cart/checkout');
        if($opt == "ho")
            return redirect('/user/home');
    }
    
    public function addAddress($opt)
    {
        //category part
        $header = new Header();
        $category = $header->category();

        $cartCollection = Cart::getContent()->toArray();

        return view('user.user-add-address',compact('category', 'cartCollection', 'opt'));
    }

    public function verifyAddAddress($opt, AddressRequest $request)
    {
        $uid = session()->get('id');
        DB::insert("INSERT INTO user_address (uid, name, company, address_1, address_2, thana, district, division, country, post_code, default_address) VALUES(?,?,?,?,?,?,?,?,?,?,?)",[$uid, $request->name, $request->company, $request->address_1, $request->address_2, $request->thana, $request->district, $request->division, $request->country, $request->post_code, $request->default_address]);

        $ret = DB::select("SELECT LAST_INSERT_ID() as Id");
        $id = $ret[0]->Id;
        DB::update("UPDATE user_address SET default_address=NULL WHERE uid=$uid");
        DB::update("UPDATE user_address SET default_address='yes' WHERE id=$id");

        if($opt == "ab")
            return redirect('/user/address-book');
        if($opt == "check")
            return redirect('/user/cart/checkout');
        if($opt == "ho")
            return redirect('/user/home');
    }

    public function addToWishlist($table, $pid)
    {
        $uid = session()->get('id');
        $result = DB::select("SELECT * FROM wishlist WHERE uid=? AND table_name=? AND pid=?",[$uid, $table, $pid]);
        if(!$result)
        {
            DB::insert("INSERT INTO wishlist (uid, table_name, pid) VALUES(?,?,?)",[$uid, $table, $pid]);
        }

        return back();
    }

    public function deleteFromWishlist($id)
    {
        $date=date('d-m-Y');
        DB::update("UPDATE wishlist SET deleted='$date' WHERE id=$id");
        return back();
    }

    public function showWishlist()
    {
        //category part
        $header = new Header();
        $category = $header->category();

        $cartCollection = Cart::getContent()->toArray();

        $uid = session()->get('id');
        $result = DB::select("SELECT * FROM wishlist WHERE uid=$uid AND deleted IS NULL ORDER BY id DESC");
        
        $wishlist = array();
        $wishlistCount = 0;
        foreach($result as $rs)
        {
            $query = "SELECT * FROM $rs->table_name WHERE Id=$rs->pid AND Deleted IS NULL";
            $temp = DB::select($query);
            //dd($temp);
            foreach($temp as $t)
            {
                $wishlist[] = (object) array('id' => $rs->id, 'pid' => $t->Id, 'table' => "$rs->table_name", 'title' => ucfirst($t->Title), 'model' => ucfirst($t->Model), 'price' => number_format($t->Price), 'picture' => ($t->Picture_1));
                $wishlistCount++;
                break;
            }           
        }
        //dd($wishlist);
        return view('user.user-wishlish',compact('category','cartCollection','wishlist','wishlistCount'));
    }

    public function wishlistToCart($id, $table, $pid)
    {
        $query = "SELECT * FROM $table WHERE Id=$pid AND Deleted IS NULL";
        $product = DB::select($query);
        //dd($product);
        //add to cart
        foreach($product as $pro)
        {   
            $newId = $table.'&'.$pro->Id;
            $add = Cart::add(array(
                'id' => "$newId",
                'name' => "$pro->Title",            
                'price' => $pro->Price,
                'quantity' => 1,
                'attributes' => array('picture'=>"$pro->Picture_1")
            ));
            $this->deleteFromWishlist($id);
            return back();
        }        
    }

    public function showOrderHistory()
    {
        //category part
        $header = new Header();
        $category = $header->category();

        $cartCollection = Cart::getContent()->toArray();

        $uid = session()->get('id');
        $orders = DB::select("SELECT * FROM orders WHERE uid=$uid AND deleted IS NULL ORDER BY id DESC");
        $orders_products = DB::select("SELECT * FROM orders_products WHERE oid IN (SELECT id from orders WHERE uid=$uid AND deleted IS NULL ORDER BY id DESC) ORDER BY oid DESC");
        
        $productList = array();
        foreach($orders_products as $op)
        {            
            $query = "SELECT * FROM $op->table_name WHERE Id=$op->pid";
            $product = DB::select($query);
            //dd($product[0]->Title);
            $productList[] = (object) array('oid'=>$op->oid, 'table_name'=>"$op->table_name", 'pid'=>$op->pid, 'quantity'=>$op->quantity, 'price'=>"$op->price", 'title'=>$product[0]->Title, 'picture'=>$product[0]->Picture_1);
        }
        
        $address = DB::select("SELECT * FROM user_address WHERE id IN (SELECT DISTINCT aid from orders WHERE uid=$uid AND deleted IS NULL)");

        return view('user.user-order-history',compact('category','cartCollection','orders', 'productList', 'address'));
    }

    public function showMyQuestion()
    {
        //category part
        $header = new Header();
        $category = $header->category();

        $cartCollection = Cart::getContent()->toArray();

        $email = session()->get('email');
        $name = session()->get('name');
        $result = DB::select("SELECT * FROM question_answer WHERE name=? AND email=? ORDER BY id DESC",[$name, $email]);
        //dd($result);
        $questionAnswer = array();
        foreach($result as $rs)
        {
            $query = "SELECT * FROM $rs->table_name WHERE Id=$rs->pid";
            $temp = DB::select($query);
            //dd($temp);
            foreach($temp as $t)
            {
                $questionAnswer[] = (object) array('question' => $rs->question, 'answer' => $rs->answer, 'title' => "$t->Title", 'qdate' => $rs->qdate, 'qtime' => $rs->qtime, 'adate' => $rs->adate, 'atime' => $rs->atime, 'table' => $rs->table_name, 'pid' => $rs->pid);
                break;
            } 
        }
        //dd($questionAnswer);
        return view('user.user-my-question',compact('category','cartCollection','questionAnswer'));
    }
    
    public function checkout()
    {
        //category part
        $header = new Header();
        $category = $header->category();

        $cartCollection = Cart::getContent()->toArray();

        $id = session()->get('id');
        $address = DB::select("SELECT * FROM user_address WHERE uid=? AND Deleted IS NULL AND default_address IS NOT NULL ORDER BY id DESC",[$id]);
        $subTotal = Cart::getSubTotal();

        return view('user.user-cart-checkout',compact('category','cartCollection','address', 'subTotal'));
    }

    public function verifyCheckout(Request $request)
    {
        $request->validate([
            'address' => 'required',
            'payment_method' => 'required'
        ]);

        $uid = session()->get('id');
        $email = session()->get('email');
        $subtotal = Cart::getSubTotal();
        DB::insert("INSERT INTO orders(uid, subtotal, aid, payment_method) VALUES(?,?,?,?)",[$uid, $subtotal, $request->address, $request->payment_method]);

        $ret = DB::select("SELECT LAST_INSERT_ID() as Id");
        $oid = $ret[0]->Id;
        $cartCollection = Cart::getContent();
        $cartCollection = $cartCollection->toArray();
        
        foreach($cartCollection as $cc)
        {
            $temp = explode("&", $cc['id']);
            DB::insert("INSERT INTO orders_products(oid, table_name, pid, quantity, price) VALUES(?,?,?,?,?)",[$oid, $temp[0], $temp[1], $cc['quantity'], $cc['price']]);
        }
        Cart::clear();

        $subject = "Order Report of TechGear";
        $subtotal = number_format($subtotal);
        $message = "Your order id is: $oid
                    Your total order amount is: $subtotal";
        Mail::to($email)->send(new Gmail($subject, $message));

        return redirect('/user/order-history');        
    }

    public function showRatingReview()
    {
        //category part
        $header = new Header();
        $category = $header->category();

        $cartCollection = Cart::getContent()->toArray();

        $uid = session()->get('id');
        $orders = DB::select("SELECT * FROM orders WHERE uid=$uid AND deleted IS NULL AND status IN('Completed') ORDER BY id DESC");
        $orders_products = DB::select("SELECT * FROM orders_products WHERE oid IN (SELECT id from orders WHERE uid=$uid AND deleted IS NULL ORDER BY id DESC) ORDER BY oid DESC");
        
        $productList = array();
        foreach($orders_products as $op)
        {            
            $query = "SELECT * FROM $op->table_name WHERE Id=$op->pid";
            $product = DB::select($query);
            //dd($product[0]->Title);
            $productList[] = (object) array('id'=>$op->id, 'oid'=>$op->oid, 'table_name'=>"$op->table_name", 'pid'=>$op->pid, 'customer_rating'=>$op->customer_rating, 'customer_comment'=>$op->customer_comment, 'title'=>$product[0]->Title, 'picture'=>$product[0]->Picture_1);
        }
        //dd($productList);
        return view('user.user-rating-review',compact('category','cartCollection', 'orders','productList'));
    }

    public function saveRatingReview(Request $request)
    {
        DB::update("UPDATE orders_products SET customer_rating=?, customer_comment=? WHERE id=?",[$request->stars, $request->comment, $request->op_id]);
        return back();
    }

    public function userLogout()
    {
        session()->flush();
        return redirect()->route('login');
    }
}
