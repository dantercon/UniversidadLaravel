<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Maestro;
use App\Models\User;
use App\Models\Carreras;
use App\Models\Secciones;
use Illuminate\Support\Facades\DB;

class MaestroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maestros = Maestro::all();
        return view('admin/profesor.index')->with('maestros',$maestros);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carreras = Carreras::all();
        return view('admin/profesor.create')->with('carreras', $carreras);
    }

    public function getSeccionesByCarrera( $carreraId ) {
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
            $usuario->rol_id = 2;
            $usuario->save();

            $maestros = new Maestro();

            $maestros->cedula = $request->get('cedula');
            $maestros->nombre = $request->get('nombre');
            $maestros->apellido = $request->get('apellido');
            $maestros->email = $request->get('email');
            $maestros->telefono = $request->get('telefono');
            $maestros->direccion = $request->get('direccion');
            $maestros->user_id = $usuario->id;

            $maestros->save();
            DB::commit();
            //SI TODO SALE BIEN ENTONCES SIMPLEMENTE GUARDARMOS LOS DATOS 

            }catch(\Exception $e) {
                DB::rollBack();
                die($e->getMessage());
                //SI ALGO FALLA ENTONCES DESHACEMOS LOS CAMBIOS
            }

            return redirect('/profesor');

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
        $maestro = Maestro::find($id);
        return view('admin/profesor.edit')->with('maestro',$maestro);
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
        $maestro= Maestro::find($id);

        $maestro->nombre = $request->get('nombre');
        $maestro->apellido = $request->get('apellido');
        $maestro->email = $request->get('email');
        $maestro->cedula = $request->get('cedula');
        $maestro->telefono = $request->get('telefono');
        $maestro->direccion = $request->get('direccion');

        $maestro->save();

        return redirect('/profesor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $maestro = Maestro::find($id);
        $maestro->delete();
        return redirect('/profesor');
    }
}
