<?php

namespace App\Http\Controllers;

use App\Palabra;
use App\Tema;
use Illuminate\Http\Request;

class PalabraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Tema $tema)
    {
        $palabras=Palabra::all();
        return view('palabras.index', compact('palabras', 'tema'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('palabras.create');
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
            'palabra' => 'required|unique:palabras,palabra|max:60',
            'pronunciacion' => 'required|max:60',
            'traduccion_espanol' => 'required|max:120',
            'ejemplo_ingles' => 'required|max:255',
            'traduccion_ejemplo' => 'required|max:255',
            'nota' => 'required|max:255',
        ]);
        $modulo = new Modulo() ;
        $modulo->fill($request->all());
        $modulo->save();
        return redirect()->route('modulos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Palabra  $palabra
     * @return \Illuminate\Http\Response
     */
    public function show(Palabra $palabra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Palabra  $palabra
     * @return \Illuminate\Http\Response
     */
    public function edit(Palabra $palabra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Palabra  $palabra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Palabra $palabra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Palabra  $palabra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Palabra $palabra)
    {
        //
    }
}
