<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;
use App\Cusorder;
use App\Item;

class ApiController extends Controller
{
    public function invoice(Request $request) {
      $data = new Invoice();
      $data->name = $request->name;
      $data->num_table = $request->num_table;
      $data->code_invoice = $request->num_table . date("Ymdhis");
      $data->total = 0;
      $data->status = 0;
      $data->save();
      return response()->json($data);
    }

    public function order($code) {
      $data = Invoice::where('code_invoice',$code)->with('cusorder')->get();
      return response()->json($data);
    }

    public function store(Request $request) {
      $data2 = new Cusorder();
      //$data2->code_invoice_order = '120180718094128';
      $data2->code_invoice_order = $request->code_invoice_order;
      $data2->id_item = $request->item;
      $data2->amount = $request->amount;
      $item = Item::where('id',$request->item)->first();
      $data2->total = $item->price * $request->amount;
      $data2->save();
      return response()->json($data2);
    }

    public function del($invoice, $id) {
      $data = Cusorder::where('code_invoice_order',$invoice)->where('id',$id)->first();
      $data->delete();
    }

    public function put(Request $request, $invoice, $id) {
      $data2 = Cusorder::where('code_invoice_order',$invoice)->where('id',$id)->first();
      $data2->id_item = $request->item;
      $data2->amount = $request->amount;
      $item = Item::where('id',$request->item)->first();
      $data2->total = $item->price * $request->amount;
      $data2->save();
      return response()->json($data2);
    }

    public function fix(Request $request, $invoice) {
      $total = Cusorder::where('code_invoice_order',$invoice)->sum('total');
      $data = Invoice::where('code_invoice',$invoice)->first();
      $data->total = $total;
      $data->status = 1;
      $data->save();
      return response()->json($data);
    }
}
