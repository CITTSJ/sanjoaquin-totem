<?php

namespace App\Http\Controllers\PD;

use App\Http\Controllers\Controller;
use App\Models\Sector;
use Illuminate\Http\Request;
use App\Services\ImportImage;


class SectorController extends Controller
{
  public function index() {
    $sectores = Sector::where('mostrar', true)->get();
    return view('admin.sector.index', compact('sectores'));
  }

  public function indexDelete() {
    $sectores = Sector::where('mostrar', false)->get();
    return view('admin.sector.index', compact('sectores'));
  }

  public function create() {
    return view('admin.sector.create');
  }

  public function store(Request $request) {
    $s = new Sector();
    $s->ubicacion = $request->input('ubicacion');
    $s->nombre = $request->input('nombre');
    $s->piso = $request->input('piso');
    $s->descripcion = $request->input('descripcion');

    if(!empty($request->file('image'))){
      $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);

      $filename = time();
      $folder = 'public/assets/sector/';
      $s->imagen = ImportImage::save($request, 'image', $filename, $folder);
    }

    $s->save();
    return redirect()->route('admin.sector.index')->with('success', 'Sector creado correctamente');
  }

  public function edit($id) {
    $s = Sector::findOrFail($id);
    return view('admin.sector.edit', compact('s'));
  }

  public function update(Request $request, $id) {
    $s = Sector::findOrFail($id);

    $s->ubicacion = $request->input('ubicacion');
    $s->nombre = $request->input('nombre');
    $s->piso = $request->input('piso');
    $s->descripcion = $request->input('descripcion');
    $s->mostrar = $request->input('mostrar') == 'on' ? true : false;

    $s->update();

    return back()->with('success', 'Personal actualizado correctamente');
  }

  public function updateImg(Request $request, $id) {
    $s = Sector::findOrFail($id);

    if(!empty($request->file('image'))){
      $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);

      $filename = $s->id . '' . time();
      $folder = 'public/assets/sector/';
      $s->imagen = ImportImage::save($request, 'image', $filename, $folder);
      $s->update();
    }
    return back()->with('success', 'Personal actualizado correctamente');
  }
}
