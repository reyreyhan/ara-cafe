<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function index() {
      if(!empty(session('sessionUser'))) {
        return redirect('/dashboard');
      }
      return view('login');
    }

    public function check(Request $request) {
      $data = User::where('username',$request->username)->where('password',$request->password)->count();

      if($data == 1) {
        $data = User::where('username',$request->username)->where('password',$request->password)->with(['role'])->first();
        //dd($data);
        $request->session()->put('sessionUser', $data);

        if(session('sessionUser')->role->name == "Owner") {
          return redirect('/owner');
        } else if(session('sessionUser')->role->name == "Employee"){
          return redirect('/cashflow');
        }

        //dd(session('sessionUser')->role->name);
      }
    }

    public function logout() {
      session()->flush();
      if(empty(session('sessionUser'))) {
        return redirect('/login');
      }
    }
}
