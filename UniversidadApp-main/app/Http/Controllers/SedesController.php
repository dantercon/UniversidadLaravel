<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sedes;

class SedesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sedes = Sedes::all();
        return view('admin/sedes.index')->with('sedes',$sedes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/sedes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sedes = new Sedes();

        $sedes->nombre = $request->get('nombre');
        $sedes->direccion = $request->get('direccion');
        $sedes->rif = $request->get('rif');
        $sedes->director = $request->get('director');

        $sedes->save();

        return redirect('/sedes');
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
        $sede = Sedes::find($id);
        return view('admin/sedes.edit')->with('sede',$sede);
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
        $sede = Sedes::find($id);

        $sede->nombre = $request->get('nombre');
        $sede->direccion = $request->get('direccion');
        $sede->rif = $request->get('rif');
        $sede->director = $request->get('director');

        $sede->save();

        return redirect('/sedes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sedes = Sedes::find($id);
        $sedes->delete();

        return redirect('/sedes');
    }
}
