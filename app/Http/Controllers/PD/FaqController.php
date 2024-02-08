<?php

namespace App\Http\Controllers\PD;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
  public function index() {
    $preguntas = Faq::where('mostrar', true)->get();
    return view('admin.faq.index', compact('preguntas'));
  }

  public function indexDelete() {
    $preguntas = Faq::where('mostrar', false)->get();
    return view('admin.faq.index', compact('preguntas'));
  }

  public function create() {
    return view('admin.faq.create');
  }

  public function store(Request $request) {
    $faq = new Faq();
    $faq->pregunta = $request->input('pregunta');
    $faq->respuesta = $request->input('respuesta');
    $faq->save();

    return redirect()->route('admin.faq.index')->with('success', 'Pregunta creada correctamente');
  }

  public function edit($id) {
    $faq = Faq::find($id);
    return view('admin.faq.edit', compact('faq'));
  }

  public function update(Request $request, $id) {
    $faq = Faq::find($id);
    $faq->pregunta = $request->input('pregunta');
    $faq->respuesta = $request->input('respuesta');
    $faq->mostrar = $request->input('mostrar') == 'on' ? true : false;
    $faq->update();

    return back()->with('success', 'Pregunta actualizada correctamente');
  }
}
