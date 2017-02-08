<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class marcas extends Model
{

  protected $table= 'marcas';

  protected $fillable = [
      'nombre'
  ];

  public function Producto(){
    return $this->belongsTo(productos::class);
  }

}
