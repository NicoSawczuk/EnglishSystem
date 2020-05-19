<?php

namespace App\Http\Controllers;

use App\Modulo;
use App\Palabra;
use App\Tema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

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

        $stringConsulta = "";
        $j = 1;


        foreach ($id as $i){
            $i = intval($i);
            if (count($id) != $j){
                $stringConsulta = $stringConsulta."tema_id = ".strval($i)." or ";
                $j += 1;
            }else{
                $stringConsulta = $stringConsulta."tema_id = ".strval($i);
                $j += 1;
            }
        }

//         // foreach ($id as $i){
//         //     if (count($id) != $j){
//         //         $stringConsulta = $stringConsulta."tema_id = ".strval($i)." or ";
//         //         $j += 1;
//         //     }else{
//         //         $stringConsulta = $stringConsulta."tema_id = ".strval($i);
//         //         $j += 1;
//         //     }
//         // }
// >>>>>>> d6dd2eb3d03d1056a1eac7ac7d21aa4a9e2a38a1
        
//         // $palabra = DB::table('palabras')->whereRaw(strval($stringConsulta))->orderbyRaw("RAND()")->first();
        
//         // $palabra = DB::table('palabras')->whereRaw(strval($stringConsulta))->orderbyRaw("RANDOM()")->first();
//         //********************* */
//         $palabra = DB::table('palabras');
       
//         foreach ($id as  $i) {
//             $palabra = $palabra->orWhere('tema_id',intval($i));
      
//         }
//         $palabra = $palabra->orderbyRaw("RAND()")->first();
//         //********************* */



        if ($palabra != null){
            if ($palabra->ejemplo_ingles == null){
                $palabra->ejemplo_ingles = "";
            }
            if ($palabra->traduccion_ejemplo == null){
                $palabra->traduccion_ejemplo = "";
            }
            if ($palabra->nota == null){
                $palabra->nota = "";
            }
    
            return json_encode($palabra);
        }else{
            return json_encode($palabra);
        }

    }
}
