<?php

namespace App\Http\Controllers;

use App\Palabra;
use Illuminate\Http\Request;

class PalabraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $palabras=Palabra::all();
        return view('palabras.index', compact('palabras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
