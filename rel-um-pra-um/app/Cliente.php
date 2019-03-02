<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public function endereco(){
        //model(table), 'foreign_key', 'primary_key'
        return $this->hasOne('App\Endereco', 'cliente_id', 'id');
    }
}
