<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cusorder extends Model
{
  protected $table = "cusorder";
  public $timestamps = false;

  public function invoice() {
    return $this->hasOne('App\Invoice','code_invoice','code_invoice_order');
  }

  public function item() {
    return $this->hasOne('App\Item','id','id_item');
  }
}
