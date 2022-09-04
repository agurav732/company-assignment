<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use App\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
class MainController extends Controller
{
    //
    function index()
    {
     return view('login');
    }
     function checklogin(Request $request)
    {
    $fields =  $request->validate( [
      'email'   => 'required|email',
      'password'  => 'required|alphaNum|min:3'
     ]);

    //  $user_data = array(
    //   'email'  => $request->get('email'),
    //   'password' => $request->get('password')
    //  );

    $user = User::where('email',$fields ['email'])->first();
    if(!$user || !Hash::check($fields ['password'], $user->password)){
        return response([
            'message'=>'Bad Creds'
        ],401);
    }

      $token = $user->createToken('myapptoken')->plainTextToken;

      $user->s_token = $token;
      if($user->save()){
  return response([
            'user'=>$user,
            'token'=>$token,
            'redirect_location'=>'dashboard'
        ],201);
      }

    

    //  if(Auth::attempt($user_data))
    //  {
    //   return redirect('dashboard');
    //  }
    //  else
    //  {
    //   return back()->with('error', 'Wrong Login Details');
    //  }

    }

    function dashboard(Request $request)
    {
     $token =  $_COOKIE['token'] ?? '0';
          $user = User::where('s_token',$token)->first();
          if(!$user){
            return redirect('/')->with('error', 'Please Login First');;
          }
     return view('dashboard');
    }

    function logout()
    {
if (isset($_COOKIE['token'])) {
unset($_COOKIE['token']); 
unset($_COOKIE['token']); 
setcookie('token', null, -1, '/'); 

}
     Auth::logout();
     return redirect('/');
    }
}
