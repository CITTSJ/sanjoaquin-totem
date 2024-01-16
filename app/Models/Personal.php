<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use HasFactory;

  protected $table = 'personal';

  public function getImg() {
    $img = $this->imagen ? asset('pd/img/media/'.$this->imagen) : asset('pd/img/media/default.png');

    return $img;
  }

  public function get_raw() {
    return [
      'id' => $this->id,
      'nombre' => $this->nombre,
      'cargo' => $this->cargo,
      'correo' => $this->correo,
      'imagen' => $this->getImg(),
      'puesto' => $this->puesto,
      'ubicacion' => $this->ubicacion,
    ];
  }

}
