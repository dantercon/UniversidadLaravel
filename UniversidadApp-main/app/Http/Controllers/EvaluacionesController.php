<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evaluaciones;

class EvaluacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $evaluaciones = Evaluaciones::all();
        return view('admin/evaluacion.index')->with('evaluaciones',$evaluaciones);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/evaluacion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $evaluaciones = new Evaluaciones();

        $evaluaciones->name = $request->get('name');
        $evaluaciones->tipo = $request->get('tipo');
        $evaluaciones->porcentaje =$request->get('porcentaje');
        $evaluaciones->materiales = $request->get('materiales');
        
        $evaluaciones->save();

        return redirect('/evaluacion');

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
        $evaluacion = Evaluaciones::find($id);
        return view('admin/evaluacion.edit')->with('evaluacion',$evaluacion);
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
        $evaluacion = Evaluaciones::find($id);

        $evaluacion->name = $request->get('name');
        $evaluacion->tipo = $request->get('tipo');
        $evaluacion->porcentaje =$request->get('porcentaje');
        $evaluacion->materiales = $request->get('materiales');
        
        $evaluaciones->save();

        return redirect('/evaluacion');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $evaluacion = Evaluaciones::find($id);
        $evaluacion->delete();

        return redirect('/evaluacion');
    }
}
