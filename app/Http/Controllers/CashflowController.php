<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cashflow;

class CashflowController extends Controller
{
    public function index() {
      return view('empty');
    }

    public function cashflow() {
      return view('cashflowinsert');
    }

    public function store(Request $request) {
      $data = new Cashflow();
      $data->id_user = session('sessionUser')->id;
      $data->information = $request->information;
      $data->code = 0;
      if($request->type == 1) {
        $data->cash = $request->cash;
      } else if($request->type == 0) {
        $data->cash = $request->cash * -1;
      }
      //dd($request->type);
      $data->save();
      return redirect()->back();
    }

    public function view() {
      //if(session('sessionUser')->role->nama == "Owner") {
        $data = Cashflow::with(['user'])->get();
        return view('cashflow',compact('data'));
      //} else {
        //return redirect()->back();
      //}
      //dd(session('sessionUser')->role->name);
    }

    public function blank() {
      return view('empty');
    }
}
