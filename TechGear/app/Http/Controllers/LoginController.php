<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\LoginRequest;
use App\Http\CustomClass\Header;
use Cart;

class LoginController extends Controller
{
    public function showLogin()
    {
    	//category part
        $header = new Header();
        $category = $header->category();

        $cartCollection = Cart::getContent()->toArray();

        return view('login',compact('category','cartCollection'));
    }

    public function submitLogin(LoginRequest $request)
    {
        $user = DB::select("select * from user where email = ? and password = ?", [$request->email, $request->password]);
        if(!$user)
            return back()->with('msg', 'Email or Password is incorrect');
    	
    	if($user[0]->type == 'admin')
    	{
            foreach ($user as $u) 
            {
                $request->session()->put('id', "$u->id");
                $request->session()->put('name', "$u->name");
                $request->session()->put('email', "$u->email");
                $request->session()->put('type', "$u->type");
                break;
            }            
            //dd($request->session()->all());
            return redirect('/admin/home');
    	}
    	else
    	{    		
            foreach ($user as $u) 
            {
                $request->session()->put('id', "$u->id");
                $request->session()->put('name', "$u->name");
                $request->session()->put('email', "$u->email");
                $request->session()->put('type', "$u->type");
                break;
            }            
            //dd($request->session()->all());
            return redirect('/user/home');
    	}
    }
}
