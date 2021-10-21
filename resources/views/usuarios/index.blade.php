@extends('layouts.app')

@section('content')

    <a href="{{ route('usuarios.create') }}" class="btn btn-success">Crear Usuario</a>

    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Foto Perfil</th>
                    <th scope="col">Nombre Completo</th>
                    <th scope="col">Email</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr>

                        <th scope="row">{{ $usuario->id }}</th>
                        <th scope="row">
                            <img src="{{asset("fotos/".$usuario->foto)}}" width="100px" height="100px">
                        </th>
                        <td>{{ $usuario->nombre }} {{ $usuario->apellido }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>
                            <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('usuarios.delete', $usuario->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>


                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>


@endsection
