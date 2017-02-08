<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productos extends Model
{

  protected $table= 'productos';

  protected $fillable = [
      'nombre', 'precio', 'marca_id',
  ];

  public function Marcas(){

    return $this->hasMany(marcas::class);
  }


}
