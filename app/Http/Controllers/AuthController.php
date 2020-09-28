<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
class AuthController extends Controller
{
    public function getDangnhap(){
    	return view('admin.login');
    }

    public function postDangnhap(Request $request){

    	$user =  $request['name'];
    	$password = $request['password'];

    	if (Auth::attempt(['full_name'=>$user,'password'=>$password,'quyen'=>1])) 
    	{
    		return redirect()->route('list_lsp');    	
    	}
        else if (Auth::attempt(['full_name'=>$user,'password'=>$password,'quyen'=>0])) {
            return redirect()->route('index');

        } 
    	else{
    		return redirect()->route('dangnhap')->with('thatbai','Tài khoản mật khẩu không đúng');
    	}

    }

    public function getLogout(){
        Auth::logout();
        return redirect()->route('index');
    }
}


