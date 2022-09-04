<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use DataTables;

class DepartmentController extends Controller
{
    //
      function index()
    {
    
     return view('department');
    }
    function get_departments(Request $request)
    {
        // if ($request->ajax()) {
            $data = Department::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<button class="btn-floating"><i class="mdi-editor-mode-edit"></i></button>&nbsp;&nbsp;<button class="btn-floating"><i class="mdi-action-delete"></i></button>';
     
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        // }
      
        
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
