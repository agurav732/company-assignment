<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Employee;
use App\Department;
use DataTables;
class EmployeeApiController extends Controller
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index()
{
//
$data = Employee::latest()->get();
return Datatables::of($data)
->addIndexColumn()
->addColumn('action', function($row){
$btn = '<a class="btn-floating modal-trigger edit" href="#modal2" data-edit="'.$row["id"].'"><i class="mdi-editor-mode-edit" ></i></a>&nbsp;&nbsp;<button class="btn-floating del" data-del="'.$row["id"].'"><i class="mdi-action-delete"></i></button>';
return $btn;
})
->editcolumn('department', function ($row) {
$d_id = Department::select("name")->where('id',$row['department_id'])->get(); 
return $d_id[0]->name ?? "Not found";
})
->rawColumns(['action','department_id'])
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
'name'=> 'required',
'email'=> 'required|string|unique:employees,email',
'phone'=>'required|numeric|unique:employees,phone',
'address'=>'required|string',
'department_id'=>'required'
]);
// return Employee::create($request->all());
if(Employee::create($request->all())){
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
//
return Employee::find($id) ?? "Not found";
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
//
$employee = Employee::find($id);
if($employee->update($request->all())){
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
return  Employee::destroy($id);
}
}
?>