<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    function cliente(){
        //model(table), 'primary_key', 'foreign_key'
        return$this->belongsTo('App\Cliente', 'cliente_id', 'id');
    }
}
