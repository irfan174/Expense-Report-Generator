<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserTableModel;
class RegisterController extends Controller
{
    function RegisterIndex(){

    	return view('Register');
    }

    function UserRegistration(Request $request){
       $name = $request->input('name');
       $email= $request->input('email');
       $pass= $request->input('pass');
       $addr= $request->input('address');
       $insertQuery = UserTableModel::insert([
        	'name'=>$name,
        	'password'=>$pass,
        	'address'=>$addr,
        	'email'=>$email
        	

        ]);

        if($insertQuery == 1){
            
            return 1;
        }
        else{
            return 0;
        }

    }
}
