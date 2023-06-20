<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Maestro;
use App\Models\Alumno;
use App\Models\Secciones;
use App\Models\RecordAcademico;
use App\Models\Materia;
use App\Models\Carreras;
use Illuminate\Support\Facades\DB;

class CalificacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $alumno_id = 1;

       /*$alumno = Alumno::where('user_id', Auth::user()->id)->with('carreras')->first();


       if($alumno) {
        $carrera = $alumno->carrera;
        $materias = $alumno->materias()->with('profesor')->get();

       
        } else {
        // Si no se encuentra un alumno asociado al usuario autenticado, retorna algún tipo de error o redirige a la página principal.
        
        }*/

            $alumno = DB::table('alumnos')
                ->join('carreras', 'carreras.id', '=', 'alumnos.carrera_id')
                ->select('alumnos.nombre as alumno_nombre', 'alumnos.apellido as alumno_apellido', 'alumnos.cedula as alumno_cedula', 'carreras.nombre as carrera_nombre', 'carreras.id as carrera_id')
                ->where('alumnos.id', $alumno_id)
                ->first();
    
            $materias = DB::table('detalle_carreras')
                ->join('materias', 'materias.id', '=', 'detalle_carreras.materia_id')
                ->join('maestros', 'maestros.id', '=', 'materias.profesor_id')
                ->join('secciones', 'secciones.id', '=', 'materias.seccion_id')
                ->select('materias.nombre as materia_nombre', 'maestros.nombre as profesor_nombre', 'secciones.nombre as seccion_nombre')
                ->where('detalle_carreras.carrera_id', $alumno->carrera_id)
                ->where('detalle_carreras.periodo', '2023-1') // Colocar aquí el periodo que desea consultar
                ->where('detalle_carreras.alumno_id', $alumno_id) // Agregado para filtrar por el alumno en cuestión
                ->get();
            
            /*$materia = Materia::join('detalle_carreras', 'materias.id', '=', 'detalle_carreras.materia_id')
                ->join('alumnos', 'detalle_carreras.carrera_id', '=', 'alumnos.carrera_id')
                ->where('alumnos.user_id', Auth::user()->id)
                ->select('materias.id', 'materias.nombre')
                ->get();
            */
            
            $calificaciones = Materia::join('detalle_carreras', 'materias.id', '=', 'detalle_carreras.materia_id')
                ->join('alumnos', 'detalle_carreras.carrera_id', '=', 'alumnos.carrera_id')
                ->where('alumnos.user_id', Auth::user()->id)
                ->select('materias.id', 'materias.nombre')
                ->get();
                //var_dump($calificaciones);die;
                //print_r($calificaciones);die;
                //dd($calificaciones);
    
            return view('alumnos/calificaciones.index')->with('alumno',$alumno)->with('materias',$materias)->with('calificaciones',$calificaciones);      

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
