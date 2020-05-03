<?php

namespace App\Http\CustomClass;

use Illuminate\Support\Facades\DB;


class Header
{
	public function category()
	{
		$query = "SELECT DISTINCT Category FROM tables WHERE Deleted IS null";
		$cat = DB::select($query);

		$query = "SELECT Category, Table_Name FROM tables WHERE Deleted IS null";
		$data = DB::select($query);

		$result = array();
		$str = '';

		foreach($cat as $c) 
		{	
			foreach($data as $d) 
			{				
				if(strtolower($c->Category) == strtolower($d->Category))
				{
					$str .= "$d->Table_Name#";
				}				
			}	
			$str = chop($str," #");
			$result[] = (object) array('Category' => $c->Category, 'Table_Name' => $str);
			$str = '';			
		}
		
		return $result;
	}
}