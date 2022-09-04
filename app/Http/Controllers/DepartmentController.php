<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\User;
use DataTables;

class DepartmentController extends Controller
{
    //
      function index()
    {
      $token =  $_COOKIE['token'] ?? '0';
          $user = User::where('s_token',$token)->first();
          if(!$user){
            return redirect('/')->with('error', 'Please Login First');;
          }
     return view('department',compact('token'));
    }
    function get_departments(Request $request)
    {
       return Department::all();
      
        
    }

        function add_department(Request $request)
    {
            
        // echo $request->name;
        $this->validate($request, [
        'name'   => 'required',
        'description'  => 'required|min:3'
        ]);

        // if ($request->ajax()) {
           
        $department = new Department;
 
        $department->name = $request->name;
        $department->description = $request->description;
 
        if($department->save()){
            $code = 1;
            $msg = "Saved successfully !";
        }
        else{
               $code = 0;
            $msg = "something went wrong !";
        }
         $result = array("code"=>$code,"msg"=> $msg);
            return json_encode($result);
        // }
      
        
    }

     public function show($id)
    {
        //
       return Department::find($id) ?? "Not found";
    }
}
