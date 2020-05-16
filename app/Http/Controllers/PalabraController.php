<?php

namespace App\Http\Controllers;

use App\Modulo;
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
    public function create(Palabra $palabra)
    {
        $temaUsado = new  Tema();
        $modulos= Modulo::all();
        return view('palabras.create', compact('modulos', 'temaUsado'));
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
            'ejemplo_ingles' => 'max:255',
            'traduccion_ejemplo' => 'max:255',
            'nota' => 'max:255',
            'tema' => 'required'
        ]);
        $palabra = Palabra::create([
            'palabra' => $request->palabra,
            'pronunciacion' =>$request->pronunciacion,
            'traduccion_espanol' =>$request->traduccion_espanol,
            'ejemplo_ingles' =>$request->ejemplo_ingles,
            'traduccion_ejemplo' =>$request->traduccion_ejemplo,
            'nota' =>$request->nota,
            'tema_id' =>$request->tema,
        ]);
        $temaUsado= Tema::find($request->tema);
        if (!is_null($palabra)) {
            $modulos= Modulo::all();
            return view('palabras.create', compact('modulos', 'temaUsado'))->with('success', 'Palabra creada con exito');
            return redirect()->back()->with('success', 'Palabra creada con exito');
        }
        
        return redirect()->back()->withErrors('No se pudo almacenar la palabra');
    }
    public function getTemas(Modulo $modulo)
    {
        if (!is_null($modulo)) {
            if (sizeof($modulo->temas)>0) {
                return ['disponible'=>true,'temas'=>$modulo->temas];
            } else {
            }
        }
        return ['disponible'=>false];
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
        $modulos= Modulo::all();
        return view('palabras.edit', compact('modulos', 'palabra'));
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
        request()->validate([
            'palabra' => 'required|unique:palabras,palabra,'. $palabra->id.'|max:60',
            'pronunciacion' => 'required|max:60',
            'traduccion_espanol' => 'required|max:120',
            'ejemplo_ingles' => 'max:255',
            'traduccion_ejemplo' => 'max:255',
            'tema' => 'required',
            'nota' => 'max:255',
        ]);
        $palabra->update([
            'palabra' => $request->palabra,
            'pronunciacion' =>$request->pronunciacion,
            'traduccion_espanol' =>$request->traduccion_espanol,
            'ejemplo_ingles' =>$request->ejemplo_ingles,
            'traduccion_ejemplo' =>$request->traduccion_ejemplo,
            'nota' =>$request->nota,
            'tema_id' =>$request->tema,
        ]);

        if (!is_null($palabra)) {
            return redirect()->back()->with('success', 'Palabra actualizada con exito');
        }
        return redirect()->back()->withErrors('No se puede actualizar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Palabra  $palabra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Palabra $palabra)
    {
        if (is_null($palabra)) {
            return redirect()->back()->withErrors('No existe la palabra');
        }
        $palabra->delete();
        return redirect()->back()->with('success');
    }
    public function delete(Palabra $palabra)
    {
        if (is_null($palabra)) {
            return redirect()->back()->withErrors('No existe la palabra');
        }
        $palabra->delete();
        return redirect()->back()->with('success');
    }
}
