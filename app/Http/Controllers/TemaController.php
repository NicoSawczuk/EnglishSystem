<?php

namespace App\Http\Controllers;

use App\Modulo;
use App\Tema;
use Illuminate\Http\Request;

class TemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $temas = Tema::all();
        return view('/temas/index', compact('temas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modulos = Modulo::all();
        return view('temas.create', compact('modulos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'nombre'        => 'required|regex:/^[a-zA-Z\s]*$/|unique:temas,nombre',
            'descripcion'   => 'required'
        ]);

        $tema = new Tema();
        $tema->nombre = $request->nombre;
        $tema->descripcion = $request->descripcion;
        $tema->modulo_id = $request->modulo;

        $tema->save();

        
        
        if ($tema->save()) {
            $temas = Tema::all();
            return redirect()->back()->with('success', 'Tema creado con éxito');
        }
        return redirect()->back()->withErrors('No se pudo almacenar el tema');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tema  $tema
     * @return \Illuminate\Http\Response
     */
    public function show(Tema $tema)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tema  $tema
     * @return \Illuminate\Http\Response
     */
    public function edit(Tema $tema)
    {
        $modulos = Modulo::all();

        return view('temas.edit', compact('tema', 'modulos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tema  $tema
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tema $tema)
    {
        $data = request()->validate([
            'nombre'        => 'required|regex:/^[a-zA-Z\s]*$/|unique:temas,nombre,'.$tema->id,
            'descripcion'   => 'required'
        ]);

        $tema->update($data);
        return redirect(route('temas.index'))->with('success', 'Tema modificado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tema  $tema
     * @return \Illuminate\Http\Response
     */
    public function delete(Tema $tema)
    {
        if ($tema->palabras->count() > 0){
            return redirect(route('temas.index'))->with('error', 'El tema no se puede eliminar porque tiene palabras asociadas');
        }else{
            $tema->delete();
            return redirect(route('temas.index'))->with('success', 'Tema eliminado con éxito');
        }
    }
}
