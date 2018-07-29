<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cusorder;
use App\Invoice;
use App\Cashflow;

class OrderController extends Controller
{
    public function index() {
      $data = Invoice::where('status','1')->get();
      return view('kitchen',compact(['data']));
      //return "this is kitchen";
    }

    public function detail($invoice) {
      $data = Cusorder::with(['item'])->where('code_invoice_order',$invoice)->get();
      $data2 = Invoice::where('code_invoice',$invoice)->where('status','1')->first();
      //dd($data);
      return view('kitchendetail',compact(['data','data2']));
    }

    public function done($invoice) {
      $data3 = Invoice::where('code_invoice',$invoice)->first();
      $data3->status = 2;
      $data3->save();

      $data2 = Invoice::where('code_invoice',$invoice)->first();

      $data = new Cashflow();
      $data->id_user = session('sessionUser')->id;
      $data->information = 'Order Done';
      $data->code = $data2->code_invoice;
      $data->cash = $data2->total;
      //dd($data);
      $data->save();
      return redirect('kitchen');
    }

    public function owner($invoice) {
      $data = Cusorder::with(['item'])->where('code_invoice_order',$invoice)->get();
      $data2 = Invoice::where('code_invoice',$invoice)->first();
      //dd($data2);
      return view('kitchenowner',compact(['data','data2']));
    }
}
