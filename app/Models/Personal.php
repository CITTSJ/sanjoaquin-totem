<?php

namespace App\Models;

use App\Services\Imagen;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use HasFactory;

  protected $table = 'personal';


  public function getPhoto(){
    $folder = "assets/personal";
    $folder_default = "pd/img/media/";
    $imgDefault = $folder_default.'default.png';

    $img = $this->imagen;

    if (strpos($this->imagen, "image") !== false) {
      // $folder = $folder_default.$this->imagen;
      $imgDefault = $folder_default.$this->imagen;
      $img = null;
    }
    return (new Imagen($img, $folder, $imgDefault))->call();
  }

  public function get_raw() {
    return [
      'id' => $this->id,
      'nombre' => $this->nombre,
      'cargo' => $this->cargo,
      'correo' => $this->correo,
      'imagen' => asset($this->getPhoto()),
      'puesto' => $this->puesto,
      'ubicacion' => $this->ubicacion,
    ];
  }

}
