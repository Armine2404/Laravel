<?php

namespace App\Http\Controllers;
use App\Encuesta;
use Illuminate\Http\Request;

class EncuestaController extends Controller
{
   public function index()
   {
      return view('encuesta.index');
   }

   public function store(Request $request)
   {
     Encuesta::create($request->all());
     return redirect()->back()->with('message', 'Gracias sus respuestas se han guardado correctamente');
   }
}
