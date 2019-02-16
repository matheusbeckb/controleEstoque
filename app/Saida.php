<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saida extends Model
{
    protected $fillable = ['quantidade', 'valor', 'cod_sku', 'data', 'tipo_saida'];

    public function produto()
    {
        return $this->belongsTo('App\produtos');
    }

}
