@extends('layouts.escuelas')

@section('content')
    <div class="container">
        <h2>Editar escuela "{{ $escuelas->nombre }}"</h2>
        <br>

        <form action="{{ url('/escuelas/' . $escuelas->id) }}" method="post">

        @csrf
            {{ method_field('PATCH')}}


            <div class="row">
                <div class="col">
                    <br>
                    <label form="nombre"> Nombre </label>
                    <input class="form-control" type="text" name="nombre" value="{{ $escuelas->nombre }}" id="nombre" size="60" required />

                    <br>
                    <label form="claveregistro"> Clave Registro </label>
                    <input class="form-control" type="text" name="claveregistro" value="{{ $escuelas->claveregistro }}" id="claveregistro" size="55" required />

                    <br>
                    <label form="direccion"> Direccion </label>
                    <input class="form-control" type="text" name="direccion" value="{{ $escuelas->direccion }}" id="direccion" size="59" required />
                </div>
                <div class="col">
                    <br>
                    <label form="nivel"> Nivel </label>
                    <select class="form-control" name="nivel" id="nivel">
                         <option>{{ $escuelas->nivel }}</option>
                        <option>Licenciatura</option>
                        <option>Bachillerato</option>
                    </select>
                    

                    <br>
                    <br>
                    <input class="form-control btn btn-primary" type="submit" value="Editar Datos" />
                </div>
            </div>
        

        </form>
    </div>
@endsection
