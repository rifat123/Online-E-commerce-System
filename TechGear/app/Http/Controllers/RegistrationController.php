<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\RegistrationRequest;
use App\Http\CustomClass\Header;
use Cart;

class RegistrationController extends Controller
{
      public function showRegistration()
	{
		//category part
            $header = new Header();
            $category = $header->category();

            $cartCollection = Cart::getContent()->toArray();

            return view('registration',compact('category','cartCollection'));
	}

	public function submitRegistration(RegistrationRequest $request)
	{                 
            $return = DB::insert('insert into user (name, email, password, type) values (?, ?, ?, ?)', [$request->name, $request->email, $request->password, 'user']);
            return back()->with('success','Account creation successful');      	
	}
}
