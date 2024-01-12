<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

  protected $table = 'faq';


  // public function get_raw() {

  //   $img = $this->imagen ? asset('pd/img/media/'.$this->imagen) : asset('pd/img/media/default.png');

  //   return [
  //     'id' => $this->id,
  //     'nombre' => $this->nombre,
  //     'cargo' => $this->cargo,
  //     'correo' => $this->correo,
  //     'imagen' => $img,
  //     'puesto' => $this->puesto,
  //     'ubicacion' => $this->ubicacion,
  //   ];
  // }

}
