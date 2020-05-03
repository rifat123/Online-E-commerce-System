<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\SliderImageRequest;
use App\Http\Requests\UserAddOrEditRequest;
use App\Http\Requests\ProductImageRequest;
use App\Http\Requests\StaticImageRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function showAdminHome()
    {
        $data = array();

        $enabledCategory121 = DB::select("SELECT * FROM tables WHERE Deleted IS NULL");
        $data['enabledCategory121'] = count($enabledCategory121);

        $disabledCategory121 = DB::select("SELECT * FROM tables WHERE Deleted IS NOT NULL");
        $data['disabledCategory121'] = count($disabledCategory121);

        $slider121 = DB::select("SELECT * FROM scs WHERE Type='slider' AND Deleted IS NULL");
        $data['slider121'] = count($slider121);

        $collection121 = DB::select("SELECT * FROM scs WHERE Type='collection' AND Deleted IS NULL");
        $data['collection121'] = count($collection121);

        $static121 = DB::select("SELECT * FROM scs WHERE Type='static' AND Info IS NULL AND Deleted IS NULL");
        $data['static121'] = count($static121);

        $note121 = DB::select("SELECT * FROM scs WHERE Type='static' AND Info IS NOT NULL AND Deleted IS NULL");
        $data['note121'] = count($note121);

        $activeOrders121 = DB::select("SELECT * FROM orders WHERE status NOT IN('Cancelled', 'Completed') AND Deleted IS NULL");
        $data['activeOrders121'] = count($activeOrders121);

        $completedOrders121 = DB::select("SELECT * FROM orders WHERE status='Completed' AND Deleted IS NULL");
        $data['completedOrders121'] = count($completedOrders121);

        $cancelledOrders121 = DB::select("SELECT * FROM orders WHERE status='Cancelled' AND Deleted IS NULL");
        $data['cancelledOrders121'] = count($cancelledOrders121);

        $newQuestions121 = DB::select("SELECT * FROM question_answer WHERE answer IS NULL AND Deleted IS NULL");
        $data['newQuestions121'] = count($newQuestions121);

        $alreadyAnswered121 = DB::select("SELECT * FROM question_answer WHERE answer IS NOT NULL AND Deleted IS NULL");
        $data['alreadyAnswered121'] = count($alreadyAnswered121);

        $totalQuestions121 = DB::select("SELECT * FROM question_answer WHERE Deleted IS NULL");
        $data['totalQuestions121'] = count($totalQuestions121);

        $thisMonth = date('Y-m');
        $thisMonth121 = DB::select("SELECT SUM(subtotal) as subtotal FROM orders WHERE status='Completed' AND created LIKE '$thisMonth%' AND Deleted IS NULL");
        $data['thisMonth121'] = $thisMonth121[0]->subtotal;

        $lastMonth = date('Y-m', strtotime('-1 month'));
        $lastMonth121 = DB::select("SELECT SUM(subtotal) as subtotal FROM orders WHERE status='Completed' AND created LIKE '$lastMonth%' AND Deleted IS NULL");
        $data['lastMonth121'] = $lastMonth121[0]->subtotal;

        $lastOfLastMonth = date('Y-m', strtotime('-2 month'));
        $lastOfLastMonth121 = DB::select("SELECT SUM(subtotal) as subtotal FROM orders WHERE status='Completed' AND created LIKE '$lastOfLastMonth%' AND Deleted IS NULL");
        $data['lastOfLastMonth121'] = $lastOfLastMonth121[0]->subtotal;
        
        $totalSales121 = DB::select("SELECT SUM(subtotal) as subtotal FROM orders WHERE status='Completed' AND Deleted IS NULL");
        $data['totalSales121'] = $totalSales121[0]->subtotal;
 
        return view('admin.admin-home', compact('data'));
    }

    public function showAdminAccount()
    {
        $id = session()->get('id');
        $result = DB::select("SELECT * FROM user WHERE id=$id");
        //dd($result);
        return view('admin.admin-account',compact('result'));
    }

    public function verifyAdminAccount(Request $request)
    {
        $oldData = array_reverse($request->all());
        session()->flash('oldData', $oldData);
        $id = session()->get('id');    
        $request->validate([
            'name' => 'required|max:30',
            'email' => ['required',
                        'max:50',
                        'email',
                        Rule::unique('user')->ignore($id),
                       ],
            'password' => 'max:30',
            'confirm_password' => 'same:password'
        ]);

        if($request->password)
        {
            DB::update("UPDATE user SET name=?, email=?, password=? WHERE id=?",[$request->name, $request->email, $request->password, $id]);
        }
        else
        {
            DB::update("UPDATE user SET name=?, email=? WHERE id=?",[$request->name, $request->email, $id]);       
        }

        return redirect('/admin/home')->with('msg', 'Account Successfully Changed');
    }

    public function adminLogout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('login');
    }

    public function showAdminHomeControl()
    {
    	return view('admin.home-control');
    }

    public function showAddCategoryStep1()
    {
        $data = DB::select("SELECT DISTINCT Category FROM tables");
        $category = array();
        foreach($data as $d)
        {
            if(!is_numeric($d->Category))
            {
                $category[] = (object) array('Category' => ucwords($d->Category));
            }
        }
        //dd($category);
        return view('admin.add-category-step-1',compact('category'));
    }

    public function verifyAddCategoryStep1(Request $request)
    {
        //dd($request->all());
        $query = "SELECT * FROM tables WHERE Table_Name='$request->table_name'";
        $result = DB::select($query);
        if($result)
        {
            return back()->withInput()->with('wrongCat','This category is already used');
            
        }
        else
        {   
            if($request->category)
            return redirect("/admin/add-category-step2/$request->category/$request->table_name/$request->num_properties");
            else
            return redirect("/admin/add-category-step2/x155x/$request->table_name/$request->num_properties");
        }
       
    }

    public function showAddCategoryStep2($cat, $tab, $np)
    {
        //dd($cat);
        return view('admin.add-category-step-2',compact('cat','tab','np'));
    }

    public function verifyAddCategoryStep2($cat, $tab, $np, Request $request)
    {   
        $cat = strtolower($cat);
        $cat = preg_replace('/\s+/', ' ',$cat);  

        $tab = strtolower($tab);
        $tab = preg_replace('/\s+/', ' ',$tab);       
        $tab = str_replace(' ','_',$tab);       
        //dd($request->all()); 

        $query = "SELECT * FROM tables WHERE Table_Name = '$tab'";
        if(DB::select($query) == NULL)
        {
            if($cat == "x155x")
            {
                $query1 = "INSERT INTO tables(Table_Name) VALUES('$tab')";
                DB::insert($query1);
                
                $ret = DB::select("SELECT LAST_INSERT_ID() as Id");
                $id = $ret[0]->Id;
                
                $query2 = "UPDATE tables SET Category=$id, Deleted = NULL WHERE Id=$id"; 
                DB::update($query2);                              
            }
            else
            {
                $query1 = "INSERT INTO tables(Category, Table_Name) VALUES('$cat','$tab')";
                DB::insert($query1);
            }

            ///////////make column
            $str = $tab.'column';           
            $query3 = "CREATE TABLE $str (
                            `Id` int(5) AUTO_INCREMENT PRIMARY KEY,
                            `Column_Name` varchar(100) NOT NULL,
                            `Column_Type` varchar(100) NOT NULL,
                            `Required` varchar(100)  DEFAULT NULL,
                            `Dummy_Data` varchar(100)  NOT NULL,
                            `Max_Length` int(5) NOT NULL
                      )";
            DB::statement($query3);

            ///////////inset 1st default properties
            $query4 = "INSERT INTO $str(Column_Name, Column_Type, Required, Dummy_Data, Max_Length)
                                 VALUES('Id', 'number', 'required', '101', 5),
                                       ('Title', 'text', 'required', '$request->dummy_data_title', 200),
                                       ('Brand', 'text', 'required', '$request->dummy_data_brand', 200),
                                       ('Model', 'text', 'required', '$request->dummy_data_model', 200)
                      ";
            DB::insert($query4);

            ///////////inset admin given properties
            for($i=1; $i<$request->loopCount; $i++)
            {
                $columnName = 'column_name'.$i;                
                $columnName = $request->$columnName; 

                $columnType = 'column_type'.$i;
                $columnType = $request->$columnType;

                $required = 'required'.$i;
                $required1 = $request->$required;
                //dd($required);

                $dummyData = 'dummy_data'.$i;
                $dummyData = $request->$dummyData;
                
                $requiredValue = NULL;
                if(isset($request->$required))
                {
                    $requiredValue = $request->$required;
                }
                //dd($requiredValue);
                
                if($request->$required == null)
                {
                    $columnName = preg_replace('/\s+/', ' ',$columnName);       
                    $columnName = str_replace(' ','_',$columnName);       
                    $query5 = "INSERT INTO $str(Column_Name, Column_Type, Dummy_Data, Max_Length) VALUES('$columnName', '$columnType', '$dummyData', 200)";
                    DB::insert($query5);
                }
                else
                {
                    $columnName = preg_replace('/\s+/', ' ',$columnName);       
                    $columnName = str_replace(' ','_',$columnName);  
                    $query5 = "INSERT INTO $str(Column_Name, Column_Type, Required, Dummy_Data, Max_Length) VALUES('$columnName', '$columnType','$required1', '$dummyData', 200)";
                
                    DB::insert($query5);
                }
                
                usleep(100000); 
            }

            ///////////inset 2nd default properties
            $query6 = "INSERT INTO $str(Column_Name, Column_Type, Required, Dummy_Data, Max_Length)
                                 VALUES('Warranty', 'text', 'required', '$request->dummy_data_warranty', 50),
                                       ('Quantity', 'number', 'required', '125', 5000),
                                       ('Price', 'number', 'required', '25300', 1000000),
                                       ('Video_Link', 'url', NULL, 'https://www.youtube.com/watch?v=gLb9dlG1SCU', 200),
                                       ('Picture_1', 'file', NULL, 'Size of picture must be 600x600', 50),
                                       ('Picture_2', 'file', NULL, 'Size of picture must be 600x600', 50),
                                       ('Picture_3', 'file', NULL, 'Size of picture must be 600x600', 50),
                                       ('Picture_4', 'file', NULL, 'Size of picture must be 600x600', 50),
                                       ('Picture_5', 'file', NULL, 'Size of picture must be 600x600', 50),
                                       ('Picture_6', 'file', NULL, 'Size of picture must be 600x600', 50),
                                       ('Deleted', 'text', NULL , '04-02-2019', 50)
                      ";
            DB::insert($query6);

            ///////////make filter table
            $str1 = $tab.'filter';           
            $query7 = "CREATE TABLE $str1 (
                            `Id` int(5) AUTO_INCREMENT PRIMARY KEY,
                            `Filter_Name` varchar(50) NOT NULL                            
                      )";
            DB::statement($query7);

            ////////////// insert into filter            
            if($request->filter_brand != null)
            {
                $query8 = "INSERT INTO $str1(Filter_Name) VALUES('Brand')";
                DB::insert($query8);
            }

            for($i=1; $i<$request->loopCount; $i++)
            {
                $filter = 'filter'.$i;   //filter1 
                $columnName = 'column_name'.$i; //column_name1
                $columnName = $request->$columnName;            
                if($request->$filter != null)
                {
                    $columnName = preg_replace('/\s+/', ' ',$columnName);       
                    $columnName = str_replace(' ','_',$columnName);  
                    $query9 = "INSERT INTO $str1(Filter_Name) VALUES('$columnName')";
                    DB::insert($query9);
                    usleep(100000);
                }
            }

            if($request->filter_warranty != null)
            {
                $query10 = "INSERT INTO $str1(Filter_Name) VALUES('Warranty')";
                DB::insert($query10);
            }


            ////////////make data table
            $str2 = $tab;
            $query11 = "CREATE TABLE $str2 (";           
            $q = "SELECT * FROM $str";
            $information = DB::select($q);
            foreach ($information as $info) 
            {
               if($info->Column_Name == "Id")
               {
                    $query11 .= "`Id` int(5) AUTO_INCREMENT PRIMARY KEY,";
               }

               else
               {
                    $query11 .= "`$info->Column_Name` ";
                    if($info->Column_Type == "number")
                    {
                        $query11 .= "int(6) ";
                    }

                    if($info->Column_Type == "text" || $info->Column_Type == "file" || $info->Column_Type == "url")
                    {
                        $query11 .= "varchar(200) ";
                    }

                    if($info->Required == "required")
                    {
                        $query11 .= "NOT NULL,";
                    }

                    if($info->Required != "required")
                    {
                        $query11 .= "DEFAULT NULL,";
                    }
               }
            }

            $query11 = chop($query11,",");
            $query11 .=  ")";
            DB::statement($query11);
            return redirect('/admin/home')->with('msg', 'Category Added Successful');
            
        }
        else
        {
           echo  ucwords($tab).' is already exist';
        }         
    }

    public function showCategoryList($opt)
    {
        $cat = NULL;        
        if($opt == "all")
            $cat = DB::select('SELECT DISTINCT Category FROM tables');
        elseif($opt == "enabled")
            $cat = DB::select('SELECT DISTINCT Category FROM tables WHERE Deleted IS NULL');
        elseif($opt == "disabled")
            $cat = DB::select('SELECT DISTINCT Category FROM tables WHERE Deleted IS NOT NULL');

        if($cat)
        {
            if($opt == "all")
                $query = "SELECT * FROM tables ORDER BY FIELD(Category, ";
            elseif($opt == "enabled")
                $query = "SELECT * FROM tables WHERE Deleted IS NULL ORDER BY FIELD(Category, ";
            elseif($opt == "disabled")
                $query = "SELECT * FROM tables WHERE Deleted IS NOT NULL ORDER BY FIELD(Category, ";

            foreach($cat as $c)
            {
                $query .= "'$c->Category', ";
            }
            $query = chop($query,", ");
            $query .= ")";
            
            $result = DB::select($query);
            return view('admin.category-list',compact('result'));
        }
        else
        {
            $result = array();
            return view('admin.category-list',compact('result'));
        }       
        
    }

    public function showAddDataToScsStep1($scs)
    {
        $table = DB::select('SELECT * from tables');
        //dd($table);
        return view('admin.add-data-to-scs-step-1',compact('table','scs'));
        
    } 

    public function showAddDataToScsStep2($scs, $table)
    {
        $cs = 0;
        if($scs == "collection")
        {
            $cs = 1;
        }
        if($scs == "static")
        {
            $cs = 2;
        }
        $tableColumn = $table."column";
        $query1 = "SELECT * FROM $tableColumn WHERE Column_Name NOT IN('Deleted')";
        $columns = DB::select($query1);
        //dd($columns);
        $query2 = "SELECT * FROM $table WHERE Deleted IS NULL order by Id desc";
        $data = DB::select($query2);
        return view('admin.add-data-to-scs-step-2',compact('cs','columns', 'data','table','scs'));
    }

    public function showAddDataToSliderStep3($table, $id)
    {
        $scs="slider";
        $tableColumn = $table."column";
        $query = "SELECT * FROM $table where Id=$id";
        $data = DB::select($query);
        //dd($data);
        return view('admin.add-data-to-slider-step-3',compact('scs','table','data'));
    }

    public function showAddDataToStaticStep3($opt)
    {
        
        if($opt == "note")
        {
            $scs="static";
            return view('admin.add-data-to-static-note',compact('scs'));
        }
        else
        {
             $temp = explode("_",$opt);
             $query = "SELECT Title, Brand, Picture_1 FROM $temp[0] WHERE Id=$temp[1]";
             $data = DB::select($query);
             $scs = "static"."/".$temp[0];
             return view('admin.add-data-to-static-note',compact('scs','data'));
        }
    }

    public function verifyAddDataToStaticStep3($opt, StaticImageRequest $request)
    {
        $scs="static";

        if($request->validated())
        {
           if($opt == "note")
           {
                $query = "insert into scs (Type, Info) VAlUES ('static', $request->note)";
                //dd($query);
                $return = DB::insert("insert into scs (Type, Info) VAlUES ('static', ?)",[$request->note]);
                $ret = DB::select("SELECT LAST_INSERT_ID() as Id");
                $id = $ret[0]->Id;
           
                $picture = $request->file("picture");
                $newName = $id . '.' . $picture->getClientOriginalExtension();
                $picture->move(public_path("/images/static"),$newName);
                $picturePath = "/images/static/$newName";
                $query1 = "UPDATE scs SET Picture='$picturePath', Deleted = null WHERE Id=$id";
                //dd($query1);
                if(DB::update($query1))
                {
                    return redirect('/admin/home')->with('msg', 'Successfully Uploaded');
                }
            }

            else
            {
                $temp = explode("_",$opt);

                $query = "insert into scs (Table_Name, Product_Id, Type) VAlUES ('$temp[0]', '$temp[1]','static')";
                //dd($query);
                $return = DB::insert($query);
                $ret = DB::select("SELECT LAST_INSERT_ID() as Id");
                $id = $ret[0]->Id;
           
                $picture = $request->file("picture");
                $newName = $id . '.' . $picture->getClientOriginalExtension();
                $picture->move(public_path("/images/static"),$newName);
                $picturePath = "/images/static/$newName";
                $query1 = "UPDATE scs SET Picture='$picturePath', Deleted = null WHERE Id=$id";
                //dd($query1);
                if(DB::update($query1))
                {
                    return redirect('/admin/home')->with('msg', 'Successfully Added');
                }
            }
        }
    }


    public function deleteDataOfScs($scs)
    {
        $data = array();
        if($scs == "slider")
        {
            $query = "SELECT Id, Table_Name, Product_Id, Picture FROM scs WHERE Type = 'slider' AND Deleted IS NULL order by Id desc";
            $data = DB::select($query);
        }
        
        else if($scs == "collection")
        {
            $query1 = "SELECT Id, Table_Name, Product_Id FROM scs WHERE Type = 'collection' AND Deleted IS NULL order by Id desc";
            $data = DB::select($query1);
        }
        
        else if($scs == "static all")
        {
            $query2 = "SELECT Id, Table_Name, Product_Id, Picture, Info FROM scs WHERE Type = 'static' AND Deleted IS NULL order by Id desc";
            $data = DB::select($query2);
            $scs = "static";
        }

        else if($scs == "static")
        {
            $query2 = "SELECT Id, Table_Name, Product_Id, Picture, Info FROM scs WHERE Type = 'static' AND Info IS NULL AND Deleted IS NULL order by Id desc";
            $data = DB::select($query2);
            $scs = "static";
        }

        else if($scs == "static note")
        {
            $query2 = "SELECT Id, Table_Name, Product_Id, Picture, Info FROM scs WHERE Type = 'static' AND Info IS NOT NULL AND Deleted IS NULL order by Id desc";
            $data = DB::select($query2);
            $scs = "static";      
        }

        return view('admin.scs-view',compact('data','scs'));
    }

    public function verifyDeleteDataOfScs($scs, Request $request)
    {
        $date=date('d-m-Y');
       // dd($date);
        DB::update("UPDATE scs SET Deleted = '$date' where Id=?",[$request->scsId]);
        $link = "/admin/home-control/delete-data/$scs";
        if($scs == "slider")
            return redirect($link);
        if($scs == "collection")
            return redirect($link);
        if($scs == "static")  
            return redirect($link);
    }

    public function verifyAddDataToScsStep2($scs, $table, Request $request)
    {
        $tableColumn = $table."column";
    
        $query2 = "insert into scs (Table_Name, Product_Id, Type) VAlUES ('$table', $request->Id, '$scs')";

            if(DB::insert($query2))
            {
                if($scs == "collection")
                {
                    return redirect('/admin/home')->with('msg', 'Successfully Added');
                }                
            }
    }

    public function verifyAddDataToSliderStep3($table, $id, SliderImageRequest $request)
    {
        $tableColumn = $table."column";
    
        if($request->validated())
        {
            $picture = $request->file("picture");
            $newName = $table . '_' . $id . '.' . $picture->getClientOriginalExtension();
            $picture->move(public_path("/images/slider"),$newName);
            $picturePath = "/images/slider/$newName";
            $query = "insert into scs (Table_Name, Product_Id, Picture, Type) VAlUES ('$table', $id, '$picturePath', 'slider')";

            if(DB::insert($query))
            {
                return redirect('/admin/home')->with('msg', 'Successfully Uploaded');
            }
     
        }
    }

    public function showAdminUserControl()
    {
    	$user = DB::select("SELECT * from user WHERE deletedAt IS NUll AND type='user' ORDER BY id DESC");
    	//dd($user);
    	return view('admin.user-control', compact(['user']));
    }

    public function showAdminUserControlEdit($id)
    {
    	$user = DB::select("SELECT * from user WHERE id = ?",[$id]);
    	return view('admin.user-edit', compact(['user']));
    }

     public function verifyAdminUserControlEdit($id, UserAddOrEditRequest $request)
    {
    	//$user = DB::select("SELECT * from user WHERE id = ?",[$id]);
    	if($request->validated())
    	{
    		$affected = DB::update('update user set name = ?, email = ?, password = ?, address = ? where id = ?', [$request->name, $request->email, $request->password, $request->address, $id]);
    		return redirect('/admin/user-control');
    	}

    	
    	//return view('admin.user-edit', compact(['user']));
    }

    public function showAdminProductControl($opt)
    {
        $table = DB::select('SELECT * from tables');
        $show = "vud-product";
        if($opt == "add-product")
        {
            $show = "add-product";
        }
        
    	return view('admin.product-control',compact('table','show'));
    }

    public function deleteUser(Request $request)
    {
    	$deleted = DB::delete('delete from user where id = ?',[$request->uid]);
    	return redirect('/admin/user-control');
    }

    public function addUser()
    {
    	return view('admin.user-add');
    }

    public function showAddProduct($table)
    {
        $tableColumn = $table."column";
        $query = "SELECT * FROM $tableColumn where Column_Name NOT IN('Id','Picture_1','Picture_2','Picture_3','Picture_4','Picture_5','Picture_6','Deleted')";
        $columns = DB::select($query);

        return view('admin.product-add',compact('columns', 'table'));
    }

    public function verifyAddProduct($table, ProductImageRequest $request)
    {   
        $tableColumn = $table."column";
        $query1 = "SELECT * FROM $tableColumn where Column_Name NOT IN('Id','Picture_1','Picture_2','Picture_3','Picture_4','Picture_5','Picture_6')";
        $columns = DB::select($query1);

        if($request->validated())
        {   
            $query2 = "insert into $table (";
            
            foreach($columns as $c)
            {
                $query2 .="$c->Column_Name ,";
            }

            $query2 = chop($query2," ,");
            $query2 .=") values (";
            $temp ="";

            foreach($columns as $c)
            {
                $temp = $c->Column_Name;
                $lol = $request->$temp;
                if($lol != null)
                $query2 .="'$lol' ,";
                else
                $query2 .="NULL ,";
            }

            $query2 = chop($query2," ,");
            $query2 .=")";
            $return = DB::insert($query2);
        
            $return = DB::select("SELECT LAST_INSERT_ID() as Id");
            $id = $return[0]->Id;
            //dd($request->picture1);
            //------------------------------------------
            $check = 0;
            for($i=1; $i<7; $i++)
            {
                $name = "Picture" . '_' . $i;
                //dd($name);
                if($request->$name != null)
                {
                    $picture = $request->file($name);
                    $newName = $name . '.' . $picture->getClientOriginalExtension();
                    $picture->move(public_path("/images/product/$table/$id"),$newName);
                    $picturePath = "/images/product/$table/$id/$newName";
                    $query = "UPDATE $table SET $name = '$picturePath', Deleted = null WHERE Id=$id";
                    DB::update($query);
                    $check = 1;
                }
            }

            if($check == 1)
            {
                return redirect('/admin/home')->with('msg', 'Product Successfully Added');
            }
        } 
    }

    public function viewProduct($table)
    {
        $tableColumn = $table."column";
        $query1 = "SELECT * FROM $tableColumn WHERE Column_Name NOT IN('Deleted')";
        $columns = DB::select($query1);

        $query2 = "SELECT * FROM $table WHERE Deleted IS NULL order by Id desc";
        $data = DB::select($query2);
        //dd($data);
        return view('admin.product-view',compact('columns', 'data','table'));
    }

    public function editProduct($table, $id)
    {
        $tableColumn = $table."column";
        $query = "SELECT * FROM $tableColumn where Column_Name NOT IN('Id','Picture_1','Picture_2','Picture_3','Picture_4','Picture_5','Picture_6','Deleted')";
        $pcolumn = DB::select($query);
        $query1 = "SELECT * FROM $table where Id = $id ";
        $data = DB::select($query1);
        //dd($data);
        return view('admin.product-edit',compact('table','pcolumn','data'));
    }

    public function verifyEditProduct($table, $id, ProductImageRequest $request)
    {
        //dd($request->P1);
        if($request->validated())
        {
            for($i=1; $i<7; $i++)
            {
                $checkboxName = "P".$i;
                $fileName = "Picture_".$i;

                if($request->$checkboxName == "on")
                {
                    $query = "UPDATE $table SET $fileName = null, Deleted = null WHERE Id=$id";
                    DB::update($query);
                }
                if($request->$fileName != null)
                {
                    $picture = $request->file($fileName);
                    $newName = $fileName . '.' . $picture->getClientOriginalExtension();
                    $picture->move(public_path("/images/product/$table/$id"),$newName);
                    $picturePath = "/images/product/$table/$id/$newName";
                    $query = "UPDATE $table SET $fileName = '$picturePath', Deleted = null WHERE Id=$id";
                    DB::update($query);
                }
            }

            //-------------------------------------------------------
            $tableColumn = $table."column";
            $query = "SELECT * FROM $tableColumn where Column_Name NOT IN('Id','Picture_1','Picture_2','Picture_3','Picture_4','Picture_5','Picture_6','Deleted')";
            $pcolumn = DB::select($query);

            $query2 = "UPDATE $table SET";
        
            foreach($pcolumn as $c)
            {
                $temp = $c->Column_Name;
                $lol = $request->$temp;
                if($lol != null)
                $query2 .=" $temp = '$lol',";
                else
                $query2 .=" $temp = NULL,";
                
            }

            $query2 = chop($query2," ,");
            //dd($query2);
            $query2 .= " WHERE Id= $id";

            $return = DB::update($query2);

            $link = "/admin/product-control/view-product/$table";
            //dd($link);
            return redirect($link);
        }      
    }

    public function deleteProduct($table, Request $request)
    {
        $date=date('d-m-Y');
        $query = "UPDATE $table SET Deleted= '$date' WHERE Id=$request->pid";
        $return = DB::update($query);

        $query = "UPDATE scs SET Deleted='$date' WHERE Table_Name='$table' AND Product_Id=$request->pid";
        $return = DB::update($query);

        $link = "/admin/product-control/view-product/$table";
        //dd($link);
        return redirect($link);
    }

    public function verifyAddUser(UserAddOrEditRequest $request)
    {
    	if($request->validated())
		{
			$user = DB::table('user')
            		->where('email', $request->email)
            		->get();
            
                  if($user->isEmpty())
                  {
                        $return = DB::insert('insert into user (name, email, password) values (?, ?, ?)', [$request->name, $request->email, $request->password]);
                       return redirect('/admin/home')->with('msg', 'User Successfully Added');
                  }
                  else
                  {
                        return view('admin.user-add')->with('emailExist','This email is already exist');
                  }           			
		}
    	
    }

    public function showQuestionAnswer($opt)
    {
        $questionAnswer = DB::select("SELECT * FROM question_answer WHERE deleted IS NULL ORDER BY id DESC");
        if($opt == "new")
            $questionAnswer = DB::select("SELECT * FROM question_answer WHERE deleted IS NULL AND answer IS NULL ORDER BY id DESC");
        elseif($opt == "answered")
            $questionAnswer = DB::select("SELECT * FROM question_answer WHERE deleted IS NULL AND answer IS NOT NULL ORDER BY id DESC"); 

        foreach( $questionAnswer as $qa)
        {
            $query = "SELECT * FROM $qa->table_name WHERE Id=$qa->pid";
            $data = DB::select($query);
            if($data)
            {
                $qa->title = $data[0]->Title;
                $qa->picture = $data[0]->Picture_1;
            }                
            else
            {
                $qa->title = NULL;
                $qa->picture = NULL;
            }

            $query = "SELECT * FROM user WHERE name='$qa->name' AND email='$qa->email'";
            $data = DB::select($query);
            if($data)
            {
                $qa->user_type = 'Registered';
            }                
            else
            {
                $qa->user_type = 'Guest';
            }
        }
        
        return view('admin.question-answer', compact('questionAnswer', 'opt'));
    }

    public function addAnswer(Request $request)
    {
        $date=date('d/m/Y');
        $time=date('h:i:s A');
        DB::update("UPDATE question_answer SET answer=?, adate=?, atime=? WHERE Id=?",[$request->answer, $date, $time, $request->op_id]);
        return back();
    }

    public function delAnswer(Request $request)
    {
        $date=date('d/m/Y');
        DB::update("UPDATE question_answer SET deleted='$date' WHERE Id=$request->scsId");
        return back();
    }

    public function showActiveOrders()
    {
        $opt= "Active";
        $activeOrders = DB::select("SELECT orders.*, user.name as customer_name FROM orders, user WHERE orders.status NOT IN('Completed', 'Cancelled') AND orders.deleted IS NULL AND orders.uid=user.id");
        
        return view('admin.orders',compact('opt','activeOrders'));
    }   

    public function showCompletedOrders()
    {
        $opt= "Completed";
        $completedOrders = DB::select("SELECT orders.*, user.name as customer_name FROM orders, user WHERE orders.status IN('Completed') AND orders.deleted IS NULL AND orders.uid=user.id ORDER BY orders.id DESC");
        
        return view('admin.orders',compact('opt','completedOrders'));
    }

    public function showCancelledOrders()
    {
        $opt= "Cancelled";
        $cancelledOrders = DB::select("SELECT orders.*, user.name as customer_name FROM orders, user WHERE orders.status IN('Cancelled') AND orders.deleted IS NULL AND orders.uid=user.id ORDER BY orders.id DESC");
        
        return view('admin.orders',compact('opt','cancelledOrders'));
    }

    public function changeStatusOfOrders(Request $request)
    {
        //dd($request->all());
        DB::update("UPDATE orders SET status=? WHERE id=?",[$request->selected_status, $request->order_id]);
        return back();
    }

    public function showOrderDetails($oid)
    {        
        $order = DB::select("SELECT orders.*, user.name as customer_name FROM orders, user WHERE orders.id=$oid AND orders.uid=user.id");
        $orders_products = DB::select("SELECT * FROM orders_products WHERE oid=$oid");

        $productList = array();
        foreach($orders_products as $op)
        {            
            $query = "SELECT * FROM $op->table_name WHERE Id=$op->pid";
            $product = DB::select($query);
            $productList[] = (object) array('id'=>$op->id, 'oid'=>$op->oid, 'table_name'=>"$op->table_name", 'pid'=>$op->pid, 'quantity'=>$op->quantity, 'price'=>"$op->price", 'title'=>$product[0]->Title, 'picture'=>$product[0]->Picture_1);
        }

        $opt= "Order Details";
        $address = NULL;
        if($order)
        {
            $aid = $order[0]->aid;
            $address = DB::select("SELECT * FROM user_address WHERE id=$aid");
        }

        return view('admin.orders',compact('opt','order','productList','address'));
    }
}
