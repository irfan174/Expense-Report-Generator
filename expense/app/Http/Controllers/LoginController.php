<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserTableModel;
class LoginController extends Controller
{
    function LoginIndex(){

    	return view('Login');
    }

    function UserLogout(Request $request){
        $request->session()->flush();
        return redirect('/login');
    }




    function UserLogin(Request $request){
       $email= $request->input('email');
       $pass= $request->input('pass');
       $countValue = UserTableModel::where('email','=',$email)->where('password','=',$pass)->count();

        if($countValue == 1){
            $request->session()->put('email', $email);
            return 1;
        }
        else{
            return 0;
        }

    }
}
