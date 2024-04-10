<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Personal;
use App\Models\Sector;
use Auth;
use Illuminate\Http\Request;


class ConsultaController extends Controller
{
  public function buscarSector() {
    try {
      $nombre = $this->filtrarNombre($_GET['nombre']);

      $sector = Sector::where('nombre', 'LIKE', '%' . $nombre . '%')->firstOrFail();
      return response()->json($sector->get_raw());
    } catch (\Throwable $th) {
      return response()->json([], 404);
    }
  }

  public function buscarSectores() {
    try {
      $nombre = $this->filtrarNombre($_GET['nombre']);

      $sectores = Sector::where('nombre', 'LIKE', '%' . $nombre . '%')->get();

      $sectores = $sectores->map(function ($sector) {
        return $sector->get_raw();
      });

      return response()->json($sectores);
    } catch (\Throwable $th) {
      return response()->json([], 404);
    }
  }

  public function export() {

    // $sectores = Sector::get();

    // $sectores = $sectores->map(function ($sector) {
    //   return $sector->get_raw();
    // });


    // return response()->json($sectores, 404);

    // $usuarios = Personal::get();

    // $sectores = $usuarios->map(function ($sector) {
    //   return $sector->get_raw();
    // });


    $faqs = Faq::get();

    // $sectores = $faqs->map(function ($sector) {
    //   return $sector->get_raw();
    // });


    return response()->json($faqs, 404);
  }

  // PRIVATE


  private function filtrarNombre($nombre) {
    // Lista de palabras comunes a eliminar
    $palabrasComunes = ["en", "la", "los", "las", "y", "o"];

    // Eliminar espacios adicionales y convertir el nombre a minúsculas
    $nombreFiltrado = strtolower(trim(preg_replace('/\s+/', ' ', $nombre)));

    // Eliminar palabras comunes
    $nombreFiltrado = str_replace($palabrasComunes, '', $nombreFiltrado);

    return $nombreFiltrado;
  }
}
