<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Secciones;

class SeccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $secciones = Secciones::all();
        return view('admin/seccion.index')->with('secciones',$secciones);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/seccion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $secciones = new Secciones();

        $secciones->nombre = $request->get('nombre');
        $secciones->matricula = $request->get('matricula');
        $secciones->apertura = $request->get('apertura');
        $secciones->cierre = $request->get('cierre');
        $secciones->lapso_de_la_seccion = $request->get('lapso');

        $secciones->save();

        return redirect('/seccion');
        
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
        $nombres = Secciones::all();
        $seccion = Secciones::find($id);
        return view('admin/seccion.edit')->with('seccion',$seccion)->with('nombres',$nombres);
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
        $seccion = Secciones::find($id);

        $seccion->nombre = $request->get('nombre');
        $seccion->matricula = $request->get('matricula');
        $seccion->lapso_de_la_seccion = $request->get('lapso');

        $seccion->save();

        return redirect('/seccion');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $seccion = Secciones::find($id);
        $seccion->delete();

        return redirect('/seccion');
    }
}
