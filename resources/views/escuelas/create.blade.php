@extends('layouts.escuelas')

@section('content')
    <div class="container">
        <h2>Registra una escuela</h2>
        <br>

        <form action="{{ url('/escuelas') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label form="nombre">Nombre</label>
                        <input class="form-control" type="text" name="nombre" id="nombre" size="60" required />
                    </div>

                    <br>

                    <div class="form-group">
                        <label form="claveregistro">Clave Registro</label>
                        <input class="form-control" type="text" name="claveregistro" id="claveregistro" size="55" required />
                    </div>

                    <br>

                    <div class="form-group">
                        <label form="direccion">Direccion</label>
                        <input class="form-control" type="text" name="direccion" id="direccion" size="59" required />
                    </div>
                </div>
                <div class="col">

                    <div class="form-group">
                        <label form="nivel">Nivel</label>
                        <select class="form-control" name="nivel">
                            <option>Licenciatura</option>
                            <option>Bachillerato</option>
                        </select>
                    </div>

                    <br>
                    <br>


                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" value="Guardar escuela" class="btn btn-success" />
                    </div>

                </div>
            </div>
        </form>
    </div>
@endsection
