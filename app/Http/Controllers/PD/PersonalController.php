<?php

namespace App\Http\Controllers\PD;

use App\Http\Controllers\Controller;
use App\Models\Personal;
use App\Services\ImportImage;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
  public function index() {
    $personals = Personal::where('mostrar', true)->get();
    return view('admin.personal.index', compact('personals'));
  }

  public function indexDelete() {
    $personals = Personal::where('mostrar', false)->get();
    return view('admin.personal.index', compact('personals'));
  }

  public function create() {
    return view('admin.personal.create');
  }

  public function store(Request $request) {
    try {
      $p = new Personal();

      $p->nombre = $request->input('nombre');
      $p->correo = $request->input('email');
      $p->puesto = $request->input('puesto');
      // $p->tipo = $request->input('tipo');
      $p->mostrar = true;

      if(!empty($request->file('image'))){
        $request->validate([
          'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $filename = time();
        $folder = 'public/assets/personal/';
        $p->imagen = ImportImage::save($request, 'image', $filename, $folder);
      }

      $p->save();

      return redirect()->route('admin.personal.index')->with('success', 'Personal creado correctamente');
    } catch (\Throwable $th) {
      return back()->with('error', 'Error al crear personal');
    }
  }

  public function edit($id) {
    $p = Personal::findOrFail($id);
    return view('admin.personal.edit', compact('p'));
  }

  public function update(Request $request, $id) {
    $p = Personal::findOrFail($id);
    $p->nombre = $request->input('nombre');
    $p->correo = $request->input('email');
    $p->puesto = $request->input('puesto');
    $p->mostrar = $request->input('mostrar') == 'on' ? true : false;

    $p->update();

    return back()->with('success', 'Personal actualizado correctamente');
  }

  public function updateImg(Request $request, $id) {
    $p = Personal::findOrFail($id);

    if(!empty($request->file('image'))){
      $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);

      $filename = $p->id . '' . time();
      $folder = 'public/assets/personal/';
      $p->imagen = ImportImage::save($request, 'image', $filename, $folder);
      $p->update();
    }
    return back()->with('success', 'Personal actualizado correctamente');
  }
}
