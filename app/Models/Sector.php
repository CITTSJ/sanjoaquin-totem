<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use HasFactory;

  protected $table = 'sector';


  public function get_raw() {

    $img = $this->imagen ? asset('pd/img/sector/'.$this->imagen) : asset('pd/img/sector/piso-inicial.jpg');

    return [
      'id' => $this->id,
      'ubicacion' => $this->ubicacion,
      'nombre' => $this->nombre,
      'piso' => $this->piso,
      'imagen' => $img,
      'descripcion' => $this->descripcion,
    ];
  }

}
