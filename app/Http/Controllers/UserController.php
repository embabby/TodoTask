<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;



class UserController extends Controller
{


  public function getLogin(){
      if (Auth::check()) {
          return redirect()->route('home');
      }
      return view('login');
    }


	public function postLogin(Request $request){
	    if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
    		// return Auth::user();
    		return [
            'code' => 200,
        ];

        }
        else{
          return [
            'code' => 401,
        ];
        }
	}



  public function logout(){
    Auth::logout();
    return view('login');

  }
}