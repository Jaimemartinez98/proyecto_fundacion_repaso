<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Roles;

class UsuariosController extends Controller
{

    public function index(){

        $usuarios = User::get();


        return view('usuarios.index',[
            'usuarios' => $usuarios,
        ]);

    }

    public function create(){

        $roles = Roles::get();


        return view('usuarios.crear',[
            'roles' => $roles,
        ]);

    }

    public function store(Request $request){


        //use Illuminate\Support\Facades\Hash;

        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'cedula' => 'required',
            'telefono' => 'required',
            'celular' => 'required',
            'direccion' => 'required',
            'rol_id' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ],[
            'nombre.required' => 'El nombre del usuario es requerido',
            'apellido.required' => 'El apellido es requerido',
            'cedula.required' => 'La cedula es requerida',
            'telefono.required' => 'El télefono es requerido',
            'celular.required' => 'El celular es requerido',
            'direccion.required' => 'La dirección es requerida',
            'rol_id.required' => 'El rol es requerido',
            'email.required' => 'El email es requerido',
            'email.email' => 'El email es no tiene el formato correcto',
            'password.required' => 'Contraseña requerida',
        ]

    );

        $usuario = new User;
        $usuario->nombre = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->cedula = $request->cedula;
        $usuario->telefono = $request->telefono;
        $usuario->celular = $request->celular;
        $usuario->direccion = $request->direccion;
        $usuario->rol_id = $request->rol_id;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->save();


        return back();

        // return redirect('/usuarios');

    }

    public function edit($id){

    }

    public function update(Request $request, $id){

    }

    public function delete($id){

        User::where('id',$id)->delete();

        return back();

    }

}
