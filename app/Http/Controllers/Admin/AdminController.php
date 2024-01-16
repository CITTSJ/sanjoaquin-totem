<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
  private $policy;

  public function __construct() {
  }

  public function index() {
    $usuarios = Usuario::get();
    return view('admin.usuario.index', compact('usuarios'));
  }

  public function create() {
    $tipos = Usuario::TIPOS;
    return view('admin.usuario.create', compact('tipos'));
  }

  public function store(Request $request) {
    $u = new Usuario();
    $u->correo = $request->input('correo');
    $u->nombre = $request->input('nombre');
    $u->apellido_materno = $request->input('apellido_m');
    $u->apellido_paterno = $request->input('apellido_p');
    $u->password = hash('sha256', $request->input('pass'));
    $u->user_app = $request->input('user_app') == 'si' ? true : false;
    $u->tipo_usuario = $request->input('admin') == 1 ? 1 : 2;
    $u->id_sede = $request->input('sede');
    $u->save();
    return redirect()->route('usuarios.index')->with('success','Se ha creado correctamente');
  }

  public function show($id) {
    $u = Usuario::findOrFail($id);
    return view('admin.usuario.show', compact('u'));
  }

  public function edit($id) {
    $u = Usuario::findOrFail($id);
    return view('admin.usuario.edit', compact('u'));
  }

  // public function update(Request $request, $id) {
  //   $this->policy->admin(current_user());

  //   $u = Usuario::findOrFail($id);

  //   if ($request->pass) {
  //     $u->password = hash('sha256', $request->input('pass'));
  //     $u->update();
  //   }

  //   if ($request->nombre) {
  //     $u->correo = $request->input('correo');
  //     $u->nombre = $request->input('nombre');
  //     $u->apellido_paterno = $request->input('apellido_p');
  //     $u->apellido_materno = $request->input('apellido_m');
  //     $u->tipo_usuario = $request->input('admin') == 1 ? 1 : 2;
  //     $u->id_sede = $request->input('sede') == 1300 ? 1300 : 100;
  //     $u->user_app = $request->input('user_app') == 'si' ? true : false;
  //     $u->update();
  //   }
  //   return back()->with('success','Se ha actualizado');
  // }



}
