<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carreras;

class CarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carreras = Carreras::all();
        return view('admin/carrera.index')->with('carreras',$carreras);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/carrera.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $carreras = new Carreras();

        $carreras->codigo = $request->get('codigo');
        $carreras->nombre = $request->get('nombre');
        $carreras->apertura = $request->get('apertura');
        $carreras->cierre = $request->get('cierre');
        $carreras->resena = $request->get('resena');
        
        $carreras->save();

        return redirect('/carrera');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carrera = Carreras::find($id);
        return view('admin/carrera.edit')->with('carrera',$carrera);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $carrera = Carreras::find($id);

        $carrera->codigo = $request->get('codigo');
        $carrera->nombre = $request->get('nombre');
        $carrera->apertura = $request->get('apertura');
        $carrera->cierre = $request->get('cierre');
        $carrera->resena = $request->get('resena');

        $carrera->save();

        return redirect('/carrera');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carrera = Carreras::find($id);
        $carrera->delete();
        return redirect('/carrera');
    }
}
