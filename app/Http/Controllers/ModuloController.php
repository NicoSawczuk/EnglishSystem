<?php

namespace App\Http\Controllers;

use App\Modulo;
use App\Palabra;
use Illuminate\Http\Request;

class ModuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modulos = Modulo::all();
        return view('modulos/index', compact('modulos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modulos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'nombre' => 'required|unique:modulos,nombre|max:255',
            'descripcion' => 'required|max:255'
        ]);
        $palabra = new Palabra() ;
        $palabra->fill($request->all());
        if ($palabra->save()) {
            return redirect()->back()->with('success', 'Palabra creada con exito');
        }
        return redirect()->back()->withErrors('No se pudo almacenar la palabra');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modulo  $modulo
     * @return \Illuminate\Http\Response
     */
    public function show(Modulo $modulo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modulo  $modulo
     * @return \Illuminate\Http\Response
     */
    public function edit(Modulo $modulo)
    {
        return view('modulos.edit', compact('modulo')) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modulo  $modulo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Modulo $modulo)
    {
        request()->validate([
            'nombre' => 'required|max:255|unique:modulos,nombre,'.$modulo->id,
            'descripcion' => 'required|max:255'
        ]);
        $modulo->fill($request->all());
        $modulo->update();
        return redirect()->route('modulos.index')->with('success', 'Modulo modificado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modulo  $modulo
     * @return \Illuminate\Http\Response
     */
    public function delete(Modulo $modulo)
    {
        if ($modulo->temas->isEmpty()) {
            $modulo->delete();
            return redirect()->route('modulos.index')->with('success', 'Modulo borrado con éxito');
        } else {
            return redirect()->back()->with('error', 'No es posible borrar el modulo debido a que tiene temas asociados');
        }
    }
}
