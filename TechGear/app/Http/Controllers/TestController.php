<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function checkTest1(Request $request)
    {
            $tableFilter = $request->table.'filter';
            //echo $tableFilter;
            $query = "SELECT Filter_Name FROM $tableFilter";
            $filter_name = DB::select($query);
            
            $query1 = "SELECT * FROM $request->table  WHERE Deleted IS NULL AND Quantity >=1 ";

            foreach($filter_name as $fn)
            {
                $temp = $fn->Filter_Name; //brand
                if($request->$temp != null)
                {
                    $arr = implode("','",$request->$temp); 
                    $query1 .="AND $temp IN('$arr') ";
                }
            }

            $query1 .= "ORDER BY Id DESC";            
            $result = DB::select($query1);
            //echo $query1;            
    		$output = "";
    		 
    		if($result)
    		{
    			foreach ($result as $r) 
    			{	
    				$numberFormat = number_format($r->Price);
                    $ti = ucfirst($r->Title);
                    $output .= "
    					<div class='card ml-3 mb-3' style='width:269px; background-color:silver'>
                            <a href='/component/$request->table/$r->Id' target='_blank'><img src='$r->Picture_1' class='card-img-top' height=269 width=269 alt='Foul'></a>
                            <div class='card-body'>
                                <h6 class='card-title font-weight-bold'><a style='text-decoration:none;' href='/component/$request->table/$r->Id' target='_blank'><span>$ti</span></a></h6>
                                Warranty: <span style='color:brown'>$r->Warranty</span></br>                       
                                Today's Price: <span style='color:brown'>TK $numberFormat</span></br>
                                <a href='/component/$request->table/$r->Id' class='btn btn-primary btn-sm mt-3'>Show More</a>
                            </div>
                        </div>
    				";
    			}
    		}
    		else
    		{
    			$output = "<div class='col-6 alert alert-warning mx-auto text-center mt-5' role='alert'>NO DATA FOUND</div>";
    		}

    		$response = $output;
      		return response()->json($response); 
    	
    }


    public function checkTest2(Request $request)
    {
        $count = $request->count;
        $loop = $count+$request->loop;
        $result = '';

        for($i=$count; $i<$loop; $i++)
        {
        $result .= "
            <div class='row'>
                <div class='col-3 mt-3'>
                    <input type='text' class='form-control form-control-sm bg-info border-info text-white' maxlength=20 name='column_name$i' placeholder='Property-$i' required>
                </div>
                <div class='col-5 mt-3'>                
                    <input type='radio' class='ml-2' name='column_type$i' value='text' checked>Text
                    <input type='radio' class='ml-2' name='column_type$i' value='number'>Number
                    <i class='ml-2 fas fa-ellipsis-v'></i>
                    <input type='checkbox' class='ml-2' name='required$i' value='required'>Must Fillup
                    <i class='ml-2 fas fa-ellipsis-v'></i>
                    <input type='checkbox' class='ml-2' name='filter$i' value='filter'>Use as Filter
                </div>
                <div class='col-4 mt-3'>
                    <input type='text' class='form-control form-control-sm bg-info border-info text-white' name='dummy_data$i' maxlength=150 placeholder='Dummy Data' required>
                </div>          
            </div>
        ";
        }
        echo $result;
    }

    public function checkTest3(Request $request)
    {
        if($request->opt == "disable")
        {
            $date = date('d-m-Y');
            $query = "UPDATE tables SET Deleted='$date' WHERE Id=$request->id";
            if(DB::update($query))
            {
               $result = "fine";
               echo $result;
            }
        }

        if($request->opt == "enable")
        {
            $query = "UPDATE tables SET Deleted=NULL WHERE Id=$request->id";
            if(DB::update($query))
            {
               $result = "fine";
               echo $result;
            }
        }        
    }

    public function checkTest4(Request $request)
    {
        $catName = $request->selected_category;
        
        if($catName == "all_category" || substr($catName, -1) == "#")
        {
            $catName = chop($catName,"#");
            $query = '';
            $tableName = DB::select("SELECT Table_Name from tables WHERE Deleted IS NULL");
            if($catName != "all_category")
            {
                $qu = "SELECT Table_Name from tables WHERE Category='$catName' AND Deleted IS NULL";
                $tableName = DB::select($qu);
            }
            
            foreach($tableName as $tn)
            {
                $query .="SELECT Id, Title, Picture_1, Price, '$tn->Table_Name' AS Table_Name FROM $tn->Table_Name WHERE Title LIKE '%$request->search%' UNION ALL ";
            }
            $query = chop($query," UNION ALL ");
            $result = DB::select($query);
            $li = '';
            foreach($result as $r)
            {
                $title = ucfirst($r->Title);
                $price = number_format($r->Price);
                $li .= "<li class='list-group-item list-group-item-action'>
                            <a href='/component/$r->Table_Name/$r->Id' style='text-decoration:none'>
                                <div class='row'>
                                    <div style='width:60px'>
                                        <img src='$r->Picture_1' class='border border-dark' alt='foul' height=60 width=60>
                                    </div>
                                    <div class='ml-2 pt-0' style='width:557px;font-size:14px;'>
                                        <span class='text-info'>$title</span></br> 
                                        <span class='font-weight-bold text-dark'>TK $price</span>
                                    </div>
                                </div>
                            </a> 
                       </li>";
            }
            echo $li;
        }
        else
        {
            $query = "SELECT Id, Title, Picture_1, Price FROM $request->selected_category WHERE Title LIKE '%$request->search%'";
            $result = DB::select($query);
            $li = '';
            foreach($result as $r)
            {
                $title = ucfirst($r->Title);
                $price = number_format($r->Price);
                $li .= "<li class='list-group-item list-group-item-action'>
                            <a href='/component/$request->selected_category/$r->Id' style='text-decoration:none'>
                                <div class='row'>
                                    <div style='width:60px'>
                                        <img src='$r->Picture_1' class='border border-dark' alt='foul' height=60 width=60>
                                    </div>
                                    <div class='ml-2 pt-0' style='width:572px;font-size:14px;'>
                                        <span class='text-info'>$title</span></br> 
                                        <span class='font-weight-bold text-dark'>TK $price</span>
                                    </div>
                                </div>
                            </a> 
                       </li>";
            }
            echo $li;
        }       
    }    

    public function checkTest5(Request $request)
    {
               
    }
}
