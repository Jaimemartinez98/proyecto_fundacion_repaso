@extends('layouts.app')

@section('content')

    <form action="{{ route('usuarios.update',$usuario->id) }}" method="POST">
        @csrf
        @method('put')

        <div class="row">

            <div class="col-4">
                <label for="nombre" class="form-label">Nombre del usuario</label>
                <input type="text" class="form-control" name="nombre" id="nombre"
                    placeholder="Ingrese el nombre del usuario" value="{{ $usuario->nombre }}">
                @if ($errors->has('nombre'))
                    <p class="text-danger">{{ $errors->first('nombre') }}</p>
                @endif
            </div>
            <div class="col-4">
                <label for="apellido" class="form-label">Apellido del usuario</label>
                <input type="text" class="form-control" name="apellido" id="apellido"
                    placeholder="Ingrese el apellido del usuario" value="{{ $usuario->apellido }}">
                @if ($errors->has('apellido'))
                    <p class="text-danger">{{ $errors->first('apellido') }}</p>
                @endif
            </div>

            <div class="col-4">
                <label for="cedula" class="form-label">Cedula del usuario</label>
                <input type="text" class="form-control" name="cedula" id="cedula"
                    placeholder="Ingrese el cedula del usuario" value="{{ $usuario->cedula }}">
                @if ($errors->has('cedula'))
                    <p class="text-danger">{{ $errors->first('cedula') }}</p>
                @endif
            </div>

            <div class="col-4">
                <label for="telefono" class="form-label">Télefono del usuario</label>
                <input type="text" class="form-control" name="telefono" id="telefono"
                    placeholder="Ingrese el telefono del usuario" value="{{ $usuario->telefono }}">
                @if ($errors->has('telefono'))
                    <p class="text-danger">{{ $errors->first('telefono') }}</p>
                @endif
            </div>

            <div class="col-4">
                <label for="celular" class="form-label">Celular del usuario</label>
                <input type="text" class="form-control" name="celular" id="celular"
                    placeholder="Ingrese el celular del usuario" value="{{ $usuario->celular }}">
                @if ($errors->has('celular'))
                    <p class="text-danger">{{ $errors->first('celular') }}</p>
                @endif
            </div>

            <div class="col-4">
                <label for="direccion" class="form-label">Dirección del usuario</label>
                <input type="text" class="form-control" name="direccion" id="direccion"
                    placeholder="Ingrese el direccion del usuario" value="{{ $usuario->direccion }}">
                @if ($errors->has('direccion'))
                    <p class="text-danger">{{ $errors->first('direccion') }}</p>
                @endif
            </div>

            <div class="col-4">
                <label for="rol_id" class="form-label">Rol del usuario</label>
                <select class="form-select" aria-label="Default select example" name="rol_id" id="rol_id">
                    <option value="">Seleccione el rol del usuario</option>
                    @foreach ($roles as $rol)
                        @if ($rol->id == $usuario->rol_id)
                            <option value="{{ $rol->id }}" selected>{{ $rol->nombre }}</option>
                        @else
                            <option value="{{ $rol->id }}">{{ $rol->nombre }}</option>
                        @endif
                    @endforeach

                </select>
                @if ($errors->has('rol_id'))
                    <p class="text-danger">{{ $errors->first('rol_id') }}</p>
                @endif
            </div>

            <br><br><br><br>
            <button type="submit" class="btn btn-success">Enviar</button>

        </div>



    </form>

@endsection
