<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome', 'quantidade_min'];

    public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }

    public function entradas()
    {
        return $this->hasMany('App\Entrada');
    }

    public function saidas()
    {
        return $this->hasMany('App\Saida');
    }

}
