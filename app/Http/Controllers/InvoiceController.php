<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;
use App\Item;
use App\Cusorder;
use DateTime;

class InvoiceController extends Controller
{
    public function index() {
      return view('customer.invoice');
    }

    public function set(Request $request) {
      $data = new Invoice();
      $data->name = $request->name;
      $data->num_table = $request->num_table;
      $data->code_invoice = $request->num_table . date("Ymdhis");
      //dd($data);
      $request->session()->put('sessionOrder', $data);
      //dd(session('sessionOrder')->name);
      return redirect('/order/' . session('sessionOrder')->code_invoice);
    }

    public function order($invoice) {
      //echo $invoice;
      $item = Item::get();
      $order = Cusorder::with(['item','invoice'])->where('code_invoice_order',$invoice)->get();
      $total = Cusorder::where('code_invoice_order',$invoice)->sum('total');
      $check = Invoice::where('code_invoice',$invoice)->count();
      //dd($total);
      //dd($order);
      return view('customer.order',compact(['item','order','total','check']));
    }

    public function store(Request $request) {

      $check = Invoice::where('code_invoice',session('sessionOrder')->code_invoice)->count();

      if($check == 0 ) {
        $data = new Invoice();
        $data->name = session('sessionOrder')->name;
        $data->num_table = session('sessionOrder')->num_table;
        $data->code_invoice = session('sessionOrder')->code_invoice;
        $data->total = 0;
        $data->status = 0;
        //dd($data);
        $data->save();
      }

      $data2 = new Cusorder();
      $data2->code_invoice_order = session('sessionOrder')->code_invoice;
      $data2->id_item = $request->item;
      $data2->amount = $request->amount;

      $item = Item::where('id',$request->item)->first();
      //dd($item->price);
      $data2->total = $item->price * $request->amount;

      $data2->save();

      return redirect()->back();

    }

    public function fix(Request $request, $invoice) {
      $total = Cusorder::where('code_invoice_order',$invoice)->sum('total');
      $data = Invoice::where('code_invoice',$invoice)->first();
      $data->total = $total;
      $data->status = 1;
      //dd($data);
      $data->save();
      $request->session()->flush();
      return redirect('/');
    }

    public function del($invoice, $id) {
      $data = Cusorder::where('code_invoice_order',$invoice)->where('id',$id)->first();
      $data->delete();

      $check = Cusorder::where('code_invoice_order',$invoice)->count();
      //dd($check);
      if($check == 0) {
        $data2 = Invoice::where('code_invoice',$invoice)->first();
        //dd($data2);
        $data2->delete();
      }

      return redirect()->back();
      //dd($data);
    }

    public function cancel(Request $request) {
      //echo "iso";
      $data = Invoice::where('code_invoice',session('sessionOrder')->code_invoice)->first();
      //dd($data);
      $data->delete();

      $data2 = Cusorder::where('code_invoice_order',session('sessionOrder')->code_invoice)->delete();
      //dd($data2);
      $request->session()->flush();
      return redirect('/');

    }

    public function ts() {
      // $data = Invoice::get();
      // //dd($data);
      // foreach($data as $u) {
      //   dd($u);
      //   $fdate = date("Y-m-d");
      //   $tdate = "2018-07-10";
      //   $datetime1 = new DateTime($fdate);
      //   $datetime2 = new DateTime($tdate);
      //   $interval = $datetime1->diff($datetime2);
      //   $days = $interval->format('%a');
      // }
      //echo intval($numDays);
      //$data = Invoice::where()->get();
      //dd($data);
      //dd(session('sessionOrder')->name);

      $data = Item::get();
      return response()->json($data);
    }
}
