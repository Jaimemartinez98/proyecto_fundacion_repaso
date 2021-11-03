<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Roles;

class UsuariosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



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
            'foto' => 'required',
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

        if ($request->hasFile("foto")) {
           $file = $request->file("foto");

           $nombre = "photo_".time().".".$file->guessExtension();

           $ruta = public_path("fotos/".$nombre);

           copy($file, $ruta);

           $usuario->foto = $nombre;

        }

        return back();

        // return redirect('/usuarios');

    }

    public function edit($id){

        $roles = Roles::get();

        $usuario = User::where('id',$id)->first();

        return view('usuarios.edit',[
            'roles' => $roles,
            'usuario' => $usuario,
        ]);

    }

    public function update(Request $request, $id){


        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'cedula' => 'required',
            'telefono' => 'required',
            'celular' => 'required',
            'direccion' => 'required',
            'rol_id' => 'required',
        ],[
            'nombre.required' => 'El nombre del usuario es requerido',
            'apellido.required' => 'El apellido es requerido',
            'cedula.required' => 'La cedula es requerida',
            'telefono.required' => 'El télefono es requerido',
            'celular.required' => 'El celular es requerido',
            'direccion.required' => 'La dirección es requerida',
            'rol_id.required' => 'El rol es requerido',

        ]

    );
        // $usuario = User::where('id',$id)->first();
        // $usuario->nombre = $request->nombre;
        // $usuario->apellido = $request->apellido;
        // $usuario->cedula = $request->cedula;
        // $usuario->telefono = $request->telefono;
        // $usuario->celular = $request->celular;
        // $usuario->direccion = $request->direccion;
        // $usuario->rol_id = $request->rol_id;
        // $usuario->save();

        $usuario = User::where('id',$id)->update([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'cedula' => $request->cedula,
            'telefono' => $request->telefono,
            'celular' => $request->celular,
            'direccion' => $request->direccion,
            'rol_id' => $request->rol_id,

        ]);

        return back();


    }

    public function delete($id){

        User::where('id',$id)->delete();

        return back();

    }


}
