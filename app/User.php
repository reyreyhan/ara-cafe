<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = "user";
    public $timestamps = false;

    public function role() {
      return $this->hasOne('App\Role','id','id_role');
    }
}
