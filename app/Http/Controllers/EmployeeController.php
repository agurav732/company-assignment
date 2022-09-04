<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\User;
use DataTables;
class EmployeeController extends Controller
{
    //
       function index()
    {
      $token =  $_COOKIE['token'] ?? '0';
          $user = User::where('s_token',$token)->first();
          if(!$user){
            return redirect('/')->with('error', 'Please Login First');;
          }
     return view('employee',compact('token'));
    }
}
