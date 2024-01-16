<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use HasFactory;

  protected $table = 'sector';

  public function getImg() {
    return $this->imagen ? asset('pd/img/sector/'.$this->imagen) : asset('pd/img/sector/piso-inicial.jpg');
  }

  public function getName() {
    return str_replace('_',' ', $this->nombre);
  }

  public function get_raw() {
    return [
      'id' => $this->id,
      'ubicacion' => $this->ubicacion,
      'nombre' => $this->nombre,
      'piso' => $this->piso,
      'imagen' => $this->getImg(),
      'descripcion' => $this->descripcion,
    ];
  }

}
