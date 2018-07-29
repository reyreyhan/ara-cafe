<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
  protected $table = "invoice";
  public $timestamps = false;

  public function cusorder() {
    return $this->hasMany('App\Cusorder','code_invoice_order','code_invoice');
  }

}
