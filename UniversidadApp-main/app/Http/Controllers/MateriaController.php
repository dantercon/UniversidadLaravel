<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materia;
use App\Models\Maestro;
use App\Models\Secciones;

class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materias = Materia::join('maestros','maestros.id','=','materias.profesor_id')
        ->join('secciones','secciones.id','=','materias.seccion_id')
        ->select(   'materias.id as id',
                    'maestros.nombre as profesor_id',
                    'secciones.nombre as seccion_id',
                    'materias.nombre as nombre'
                    //id
                //profesor_id
                //seccion_id
                //nombre
                )->get();
        return view('admin/materia.index')->with('materias',$materias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $secciones = Secciones::all();
        $maestros = Maestro::all();
        return view('admin/materia.create')->with('maestros', $maestros)->with('secciones', $secciones);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $materias = new Materia();

        $materias->profesor_id = $request->get('profesor_id');
        $materias->seccion_id = $request->get('seccion_id');
        $materias->nombre = $request->get('nombre');

        $materias->save();

        return redirect('/materia');

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
        $materia = Materia::find($id);
        $maestro = Maestro::all();
        $seccione = Secciones::all();
        return view('admin/materia.edit')->with('materia',$materia)->with('maestro', $maestro)->with('seccione', $seccione);
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
        $materia = Materia::find($id);

        $materia->profesor_id = $request->get('profesor_id');
        $materia->seccion_id = $request->get('seccion_id');
        $materia->nombre = $request->get('nombre');

        $materia->save();

        return redirect('/materia');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $materia = Materia::find($id);
        $materia->delete();
        return redirect('/materia');
    }
}
