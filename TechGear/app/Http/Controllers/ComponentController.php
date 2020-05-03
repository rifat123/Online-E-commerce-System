<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\CustomClass\Header;
use Cart;

class ComponentController extends Controller
{
    public function showComponent($table)
    {
        //category part
        $header = new Header();
        $category = $header->category();

        $cartCollection = Cart::getContent()->toArray();

        $tableFilter = $table."filter";
        $query1 = "SELECT Filter_Name FROM $tableFilter";
        $fil = DB::select($query1);
        
        $filterArr = array();
        foreach ($fil as $r) 
        {
            $query = "SELECT DISTINCT $r->Filter_Name FROM $table WHERE $r->Filter_Name IS NOT NULL AND Deleted IS NULL order by $r->Filter_Name ASC";
            $temp = DB::select($query);
            $f = $r->Filter_Name;
            $str = "";

            if($temp)
            {
                foreach ($temp as $t)
                {                 
                    $lol = $t->$f;
                    $str .= "$lol##";  
                }

                $str = chop($str,"##");
                array_push($filterArr,$str);
            }            
        }
        
        $fillName = array();
        $count = 0;

        if($temp)
        {
            foreach($fil  as $f)
            {
                array_push($fillName, $f->Filter_Name);
                $count++; 
            }
        }        
       // dd($count);
        return view('shop', compact('category','table','fillName','filterArr','count','cartCollection'));
    }


    public function showComponentDetails($table, $id)
    {   
    	//category part
        $header = new Header();
        $category = $header->category();

        $cartCollection = Cart::getContent()->toArray();

        $query = "SELECT * FROM $table WHERE Id = $id";
        $details = DB::select($query);
        
        $query1 = "SELECT * FROM $table WHERE Id NOT IN ($id) AND Deleted IS NULL ORDER BY Id DESC";
        $all = DB::select($query1);
        //dd($all);
        $tableColumn = $table.'column';
        $query2 = "SELECT Column_Name FROM $tableColumn";
        $col = DB::select($query2);
        //dd($col);
        
        $count= 0;
        $match = array();
        $relatedProduct = array();
        if($all)
        {
            foreach($all as $al)
            {
                foreach ($col as $co) 
                {
                    $col_name = $co->Column_Name;

                    if($col_name != "Id" && $col_name != "Title" && $col_name != "Warranty" && $col_name != "Quantity" && $col_name != "Picture_1" && $col_name != "Picture_2" && $col_name != "Picture_3" && $col_name != "Picture_4" && $col_name != "Picture_5" && $col_name != "Picture_6" && $col_name != "Deleted")
                    {
                        foreach($details as $de)
                        {
                            
                            if($al->$col_name == null || $de->$col_name == null)
                            {
                                break;
                            }
                            $property1 = strtolower($al->$col_name);        
                            $property1 = preg_replace('/\s+/', ' ',$property1);
                            $property1 = explode(",",$property1);
                            
                            $property2 = strtolower($de->$col_name);        
                            $property2 = preg_replace('/\s+/', ' ',$property2);
                            //dd($property2);
                            $property2 = explode(",",$property2);

                            foreach($property1 as $p1)
                            {
                                $str1 = trim($p1," ");
                                foreach($property2 as $p2)
                                {                                      
                                    $str2 = trim($p2," ");
                                    if($str1 == $str2)
                                    {
                                        $count++;
                                    }
                                }
                            }                                                            
                        }
                    }
                }
                
                if($count != 0)
                {
                    $match[] = array('Id'=>($al->Id), 'Matched'=>($count));
                }                                
                $count= 0;                              
            }            
            //dd($match);
            if($match)
            {
                usort($match, function($a, $b) {
                    return $a['Matched'] <=> $b['Matched'];
                });
                $match = array_reverse($match);

                if(count($match) <= 10)
                {
                    foreach($match as $m)
                    {                          
                        $query3 = "SELECT * FROM $table WHERE Id= $m[Id]";
                        $result = DB::select($query3);
                        array_push($relatedProduct, $result[0]);                        
                    }
                }
                else
                {   
                    $i = 0;
                    foreach($match as $m)
                    {                          
                        $query4 = "SELECT * FROM $table WHERE Id= $m[Id]";
                        $result = DB::select($query4);
                        array_push($relatedProduct, $result[0]);
                        $i++;
                        if($i == 10)
                            break;
                    }
                }
            }
            else
            {
                $relatedProduct = null;
            }           
        }
        else
        {
            $relatedProduct = null;
        }        

        //dd($relatedProduct);
        //$title = strtolower($title);        
        //$title = preg_replace('/\s+/', ' ',$title);
        //dd($title);
        //$title = implode(" ", pieces)
        //$tableColumn = $table."Column";
    	$columnData = DB::table($tableColumn)
                   		   ->whereNotIn('Column_Name', ['Id', 'Deleted','quantity'])
                           ->get();
        //dd($columnData);
        $column = array();
        $count = 0;        
        foreach($columnData as $cd)
        {
        	$column[$count] = $cd->Column_Name;
        	$count++;
        }
    	
        //question & answer
        $questionAnswer = DB::select("SELECT * FROM question_answer WHERE table_name=? AND pid=? AND deleted IS NULL AND answer IS NOT NULL ORDER BY id DESC",[$table, $id]);
        
        //rating & review
        $ratingReview = DB::select("SELECT op.*, user.name FROM orders_Products op, user, orders WHERE op.table_name='$table' AND op.pid=$id AND op.customer_rating IS NOT NULL AND op.deleted IS NULL AND orders.deleted IS NULL AND op.oid=orders.id AND orders.uid=user.id ORDER BY op.id DESC");
        
        $avgRating = 0;
        $stars = array(0,0,0,0,0,0,);
        if($ratingReview)
        {
            $avgRating = round(array_sum(array_column($ratingReview, 'customer_rating'))/count($ratingReview)); 
            //percentage of starts
            foreach($ratingReview as $rr)
            {
                if($rr->customer_rating == 1) { $stars[1]++; }
                if($rr->customer_rating == 2) { $stars[2]++; }
                if($rr->customer_rating == 3) { $stars[3]++; }
                if($rr->customer_rating == 4) { $stars[4]++; }
                if($rr->customer_rating == 5) { $stars[5]++; }                
            }

            $count = count($ratingReview);
            $stars[1] = round(($stars[1]/$count)*100);
            $stars[2] = round(($stars[2]/$count)*100);
            $stars[3] = round(($stars[3]/$count)*100);
            $stars[4] = round(($stars[4]/$count)*100);
            $stars[5] = round(($stars[5]/$count)*100);
            //dd($stars);
        }

    	
        return view('product-details', compact('category', 'details', 'column', 'relatedProduct', 'match', 'table','cartCollection','questionAnswer', 'ratingReview', 'avgRating', 'stars'));
    }

    public function askQuestion($table, $pid, Request $request)
    {   
        session()->flash('qn', 'asi');
        $request->validate([
            'name' => 'required|max:30',
            'email' => 'required|email|max:30',
            'question' => 'required|min:10|max:150',
        ]);

        $date = date("d-m-Y");
        $time = date("h:i:s a");
        DB::insert("INSERT INTO question_answer (name, email, question, table_name, pid, qdate, qtime) VALUES(?,?,?,?,?,?,?)",[$request->name, $request->email, $request->question, $table, $pid, $date, $time]);
        return back()->with('approvalMsg','Thank you for your question. It has been submitted to the webmaster for approval.');
    }
}
