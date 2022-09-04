<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use DataTables;

class DepartmentApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //show all
        // return Department::all();
          $data = Department::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                           $btn = '<a class="btn-floating modal-trigger edit" href="#modal2" data-edit="'.$row["id"].'"><i class="mdi-editor-mode-edit" ></i></a>&nbsp;&nbsp;<button class="btn-floating del" data-del="'.$row["id"].'"><i class="mdi-action-delete"></i></button>';
     
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
          $this->validate($request,[
         'name'=> 'required|unique:departments,name',
         'description'=>'required'
        ]);
       
       
           if(Department::create($request->all())){
            $code = 1;
            $msg = "Saved successfully !";
        }
        else{
               $code = 0;
            $msg = "something went wrong !";
        }
         $result = array("code"=>$code,"msg"=> $msg);
            return json_encode($result);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //get Department by ID
          return Department::find($id) ?? "Not found";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //update by ID
        $department = Department::find($id);
       if($department->update($request->all())){
            $code = 1;
            $msg = "Updated successfully !";
        }
        else{
               $code = 0;
            $msg = "something went wrong !";
        }
         $result = array("code"=>$code,"msg"=> $msg);
            return json_encode($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        return  Department::destroy($id);
    }
}
