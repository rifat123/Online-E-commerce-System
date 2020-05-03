<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\CustomClass\Header;
use Cart;
class HomeController extends Controller
{	

    public function showHome()
	{
		//category part
		$header = new Header();
		$category = $header->category();

		$cartCollection =Cart::getContent()->toArray();
		//dd($category);
		//slider part
		$query = "SELECT * from scs WHERE type='slider' AND Deleted IS null ORDER BY Id DESC";
		$sliderData = DB::select($query);
		
		//collection part
		$query1 = "SELECT * from scs WHERE type='collection' AND Deleted IS null ORDER BY Id DESC";
		$collectionData = DB::select($query1);
		$collectionArr = array();
		$count = 0;
		foreach ($collectionData as $cd) 
		{
			$query3 = "SELECT Model, Price, Warranty, Picture_1 FROM $cd->Table_Name WHERE Id=$cd->Product_Id";
			$return = DB::select($query3);
			array_push($collectionArr, ["Model"=>$return[0]->Model, "Price"=>$return[0]->Price, "Warranty"=>$return[0]->Warranty, "Picture_1"=>$return[0]->Picture_1,"Table_Name"=>$cd->Table_Name, "Product_Id"=>$cd->Product_Id]);	
			$count++;
		}

		//static part
		$query = "SELECT * from scs WHERE type='static' AND Deleted IS null ORDER BY Id DESC";
		$staticData = DB::select($query);

		return view('home',compact('category','sliderData','collectionArr','count','staticData','cartCollection'));
	}
	
	public function showNote($id)
	{
		//category part
		$header = new Header();
		$category = $header->category();

		$cartCollection = Cart::getContent()->toArray();

		$query = "SELECT Info FROM scs WHERE Id=$id AND Deleted IS NULL";
		$result = DB::select($query);
		$result = $result[0]->Info;
		$result = str_replace(' ', '&nbsp', $result);
		//dd($result);
		
		return view('note-view',compact('result','category','cartCollection'));
	}
}
