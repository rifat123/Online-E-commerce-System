<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\CustomClass\Header;
use Illuminate\Support\Facades\DB;
use Cart;

class CompareController extends Controller
{
    public function addToCompare($table, $id)
    {
    	$temp = $table.'&'.$id;
        Cart::session(121)->add(array(
    	    'id' => "$temp",
    	    'name' => "$table",    	    
    	    'price' => $id,
    	    'quantity' => 1,
    	    'attributes' => array()
    	));

        $content = Cart::session(121)->getContent()->toArray();        
        if(count($content) > 4)
        {
            Cart::session(121)->remove(array_key_first($content));
        }
        
        return back();
    }

    public function showCompare()
    {
    	//category part
		$header = new Header();
		$category = $header->category();

        $cartCollection = Cart::getContent()->toArray();

    	$compareCollection = Cart::session(121)->getContent()->toArray();    	
        //dd($compareCollection);        
        $data = array();
        $columns = NULL;

        if($compareCollection)
        {
            $table = array_unique(array_column($compareCollection, 'name'));
            $query = NULL;
            foreach($table as $t)
            {
                $tableColumn = $t.'column';
                $query .= "SELECT Column_Name FROM $tableColumn UNION ";
            }
            $query = chop($query, " UNION ");
            $columns = DB::select($query);

            foreach($compareCollection as $cc)
            {
                $id = intval($cc['price']);
                $table = $cc['name'];
                $query1 = "SELECT * FROM $table WHERE Id=$id";
                $temp = DB::select($query1);
                $temp[0]->Cat = $table ;
                array_push($data, $temp[0]);
            }           
            //dd($data);
        }

        return view('compare',compact('category','cartCollection','compareCollection','data','columns'));
    }

    public function removeFromCompare($table, $id)
    {
    	$temp = $table.'&'.$id;
        Cart::session(121)->remove($temp);
    	return back();
    }
}
