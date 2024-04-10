<?php

namespace App\Http\Controllers\PD;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Jefatura;
use App\Models\Personal;
use App\Models\Sector;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index() {
    return view('pd.index');
  }

  public function personal() {
    // $jefaturas = Jefatura::with(['personales'])->get();
    $jefaturas = Jefatura::get();

    $personales = Personal::where('activo', true)->where('nombre','<>', '')->where('mostrar', true)->orderBy('nombre', 'asc')->get();

    $raw_personales = [];
    foreach ($personales as $p) { $raw_personales[] = $p->get_raw(); }


    // return $raw_personales;

    return view('pd.personal', compact('raw_personales', 'jefaturas'));
  }

  public function personal2() {
    $personales = Personal::where('activo', true)->where('nombre','<>', '')->where('mostrar', true)->orderBy('nombre', 'asc')->get();

    $raw_personales = [];
    foreach ($personales as $p) { $raw_personales[] = $p->get_raw(); }

    return view('pd.personal2', compact('raw_personales'));
  }


  public function faq() {
    $faqs = Faq::where('activo', true)->where('pregunta','<>', '')->where('mostrar', true)->orderBy('pregunta', 'asc')->get();

    return view('pd.faq', compact('faqs'));
  }

  public function sector() {
    $sectores = Sector::where('activo', true)->where('mostrar', true)->orderBy('nombre','asc')->get();

    $raw_sectores = [];
    foreach ($sectores as $s) { $raw_sectores[] = $s->get_raw(); }

    return view('pd.sector', compact('raw_sectores'));
  }
}
