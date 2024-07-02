<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Services\Imagen;


class Sector extends Model
{
    use HasFactory;

  protected $table = 'sector';

  public function getPhoto(){
    $folder = "assets/sector";
    $folder_default = "pd/img/sector/";
    $imgDefault = $folder_default.'piso-inicial.jpg';

    $img = $this->imagen;

    // if (strpos($this->imagen, "image") !== false) {
    //   $imgDefault = $folder_default.$this->imagen;
    //   $img = null;
    // }

    if ($this->is_local) {
      $imgDefault = $folder_default.$this->imagen;
      $img = null;
    }

    return (new Imagen($img, $folder, $imgDefault))->call();
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
      'imagen' => asset($this->getPhoto()),
      'descripcion' => $this->descripcion,
    ];
  }

}
