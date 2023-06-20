<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Alumno;
use App\Models\RecordAcademico;
use App\Models\User;
use App\Models\Carreras;
use App\Models\Secciones;
use Illuminate\Support\Facades\DB;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnos = Alumno::all();
        return view('admin/alumno.index')->with('alumnos',$alumnos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carreras = Carreras::all();
        return view('admin/alumno.create')->with('carreras', $carreras);
    }

    public function getSeccionesByCarrera( $carreraId ) 
    {
        $secciones = Secciones::where('carrera_id', $carreraId)->get();

        return response()->json($secciones);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        //INICIAMOS UNA TRANSACCION PORQUE SON VARIAS TABLAS QUE DEBEMOS MANEJAR
        try {

            $usuario = new User();

            $usuario->name = $request->get('nombre');
            $usuario->email = $request->get('email');
            $usuario->password = Hash::make('1234');
            $usuario->rol_id = 3;
            $usuario->save();

            $record = new RecordAcademico();
            
            $record->fecha_inicio = date('');
            $record->save();

            $alumnos = new Alumno();

            $alumnos->recor_academico_id = $record->id;
            $alumnos->cedula = $request->get('cedula');
            $alumnos->nombre = $request->get('nombre');
            $alumnos->apellido = $request->get('apellido');
            $alumnos->telefono = $request->get('tlfn');
            $alumnos->email = $request->get('email');
            $alumnos->direccion = $request->get('direccion');
            $alumnos->user_id = $usuario->id;
            $alumnos->carrera_id = $request->get('carrera_id');
            $alumnos->seccion_id = $request->get('seccion_id');

            $alumnos->save();
            DB::commit();
            //SI TODO SALE BIEN ENTONCES SIMPLEMENTE GUARDARMOS LOS DATOS 

        }catch(\Exception $e) {
            DB::rollBack();
            die($e->getMessage());
            //SI ALGO FALLA ENTONCES DESHACEMOS LOS CAMBIOS
        }

        return redirect('/alumno');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*
         *$estudiante = Estudiante::find($estudiante_id);
         *$pagos = $estudiante->pagos;
         *return view('estudiantes.show', compact('estudiante', 'pagos'));
         */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alumno = Alumno::find($id);
        return view('admin/alumno.edit')->with('alumno',$alumno);
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
        $alumno = Alumno::find($id);

        $alumno->cedula = $request->get('cedula');
        $alumno->nombre = $request->get('nombre');
        $alumno->apellido = $request->get('apellido');
        $alumno->telefono = $request->get('tlfn');
        $alumno->email = $request->get('email');
        $alumno->direccion = $request->get('direccion');

        $alumno->save();

        return redirect('/alumno');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alumno = Alumno::find($id);
        $alumno->delete();
        return redirect('/alumno');
    }
}
