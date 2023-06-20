<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::all();
    
        return view('admin/user.index')->with('usuarios',$usuarios);
    }

    /**|||
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin/user.create')->with('roles',$roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $usuarios = new User();

        $usuarios->name = $request->get('name');
        $usuarios->email = $request->get('email');
        $usuarios->password = Hash::make($request->get('password'));
        $usuarios->rol_id = $request->get('roles');

        $usuarios->save();

        $usuarios->roles()->sync($request->roles);


        return redirect('/user');
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
        $rol = Role::all();
        $usuario = User::find($id);
        return view('admin/user.edit')->with('usuario',$usuario)->with('rol',$rol);
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
        $usuario = User::find($id);

        $usuario->name = $request->get('name');
        $usuario->email = $request->get('email');
        $usuario->roles()->sync($request->roles);

        $usuario->save();



        return redirect('/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = User::find($id);
        $usuario->delete();
        return redirect('/user');
    }

    public function cambiarEstado($id)
    {
        $usuario = User::findOrFail($id);
        
        // Verifica si el usuario que intenta cambiar el estado es el usuario autenticado
        if (auth()->user()->id === $usuario->id) {
            abort(403, 'No puedes cambiar tu propio estado.');
        }
    
        $usuario->status = !$usuario->status;
        $usuario->save();
        
        return redirect()->route('user.index');
    }

}
