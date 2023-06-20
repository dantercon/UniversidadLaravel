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
use Spatie\Permission\Models\Role;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


        //$user = Auth::user()->is_admin;

    public function index()
    {
        $user = Auth::user();
        $role = Role::where('id', $user->rol_id)->first();
        $data= '';
        if (Auth::user()->rol_id==1) {
            
            $data=$this->getdashboaradm();
        }
        return view('dashboard')->with('data',$data)->with('user',$user)->with('role',$role);
        

    }

    /*public function index()
    {
        if (Auth::user()->type == 'Estudiante') {
            return view('alumnos_rol/studiantes.home');
        } elseif (Auth::user()->type == 'Maestro') {
            return view('profesores/profesor.home');
        }
    }*/


    public function getdashboaradm(){
        $matricula = Alumno::count();
        $profesor = Maestro::count();
        $carreras = Carreras::get();

        return  ['matricula' => $matricula, 'profesor' => $profesor, 'carreras' => $carreras];
        
    }

    public function getdashboardprfesor(){

    }

    public function getdashboardestudiante(){

        $materias = Alumno::join('recor_academico','recor_academico.id','=','alumnos.proferecor_academicosor_id')
        ->join('secciones','secciones.id','=','alumnos.seccion_id')
        ->select(   'materias.id as id',
                    'maestros.nombre as profesor_id',
                    'secciones.nombre as seccion_id',
                    'materias.nombre as nombre'
                )->get();
        //return view('materia.index')->with('materias',$materias);

    }

    

}
