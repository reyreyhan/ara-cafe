<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cashflow extends Model
{
    protected $table = "cashflow";
    public $timestamps = false;

    public function user() {
      return $this->hasOne('App\User','id','id_user');
    }
}
