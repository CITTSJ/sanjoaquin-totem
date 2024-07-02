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
    $folder_default = "pd/img/personal/";
    $imgDefault = $folder_default.'default.png';

    $img = $this->imagen;

    // si tiene la palabra local
    if (strpos($this->imagen, "local") !== false) {
      // $folder = $folder_default.$this->imagen;

      // separa por -
      $img = explode('-', $this->imagen);

      $imgDefault = $folder_default.$img[1];
      $img = null;
    }

    // if (strpos($this->imagen, "local") !== false) {
    //   // $folder = $folder_default.$this->imagen;

    //   $imgDefault = $folder_default.$this->imagen;
    //   $img = null;
    // }
    return (new Imagen($img, $folder, $imgDefault))->call();
  }

  public function jefatura() {
    return $this->belongsTo(Jefatura::class, 'jefatura_id');
  }

  public function get_raw() {
    return [
      'id' => $this->id,
      'nombre' => $this->nombre . ' ' . $this->apellido,
      'name_short' => explode(' ',$this->name)[0] . ' ' . explode(' ',$this->apellido)[0],
      'cargo' => $this->cargo,
      'correo' => $this->correo,
      'imagen' => asset($this->getPhoto()),
      'puesto' => $this->puesto,
      'ubicacion' => $this->ubicacion,
      'jefatura' => $this->jefatura_id,
    ];
  }

}
