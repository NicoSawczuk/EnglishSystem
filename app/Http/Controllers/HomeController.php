<?php

namespace App\Http\Controllers;

use App\Modulo;
use App\Palabra;
use App\Tema;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $modulos = Modulo::all();
        return view('home', compact('modulos'));
    }

    public function cargarTemas(Request $request){
        $id = $request->get('idModulo');
        $temasAux = Tema::where('modulo_id', $id)->get();

        $temas = [];
        $i = 0;
        foreach ($temasAux as $tema){
            $temas[$i] = [$tema->id, $tema->nombre];
            $i +=1;
        }
        return $temas;
    }

    public function cargarCard(Request $request){
        $id = $request->get('idTema');


        $palabra = Palabra::where('tema_id', $id)->orderByRaw("RAND()")->first();

        return $palabra;
    }
}
