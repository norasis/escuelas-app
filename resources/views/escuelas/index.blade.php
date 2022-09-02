@extends('layouts.escuelas')

@section('content')
    <div class="container">

        @if (Auth::user()->tipo == 'ADMINISTRADOR')
            <form action="{{ url('/escuelas/create') }}" method="get">
                <input type="Submit" value="Agregar Escuela" class="btn btn-primary">
            </form>
        @endif
        <br>


        <table class="table table-light">
            <thead class="table-light">
                <tr>
                    <th> # </th>
                    <th> Nombre </th>
                    <th> Clave de Registro </th>
                    <th> Direccion </th>
                    <th> Nivel </th>
                    <th> Acciones </th>
                </tr>
            </thead>


            <tbody>
                @foreach ($escuelas as $escuela)
                    <tr>
                        <th>{{ $escuela->id }} </th>
                        <th> {{ $escuela->nombre }} </th>
                        <th> {{ $escuela->claveregistro }} </th>
                        <th> {{ $escuela->direccion }} </th>
                        <th> {{ $escuela->nivel }} </th>

                        @if (Auth::user()->tipo == 'ADMINISTRADOR')
                            <th class="d-flex flex-row">
                                <form action="{{ url('escuelas/' . $escuela->id . '/edit') }}" method="get">
                                    @csrf
                                    <input type="Submit" value="Editar"
                                    style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"
                                    class="btn btn-primary form-control-sm">
                                </form>
                                <form action="{{ url('escuelas/' . $escuela->id) }}" method="post">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <input type="Submit"
                                        style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"
                                        onclick="return confirm('Esta seguro que desea eliminar la escuela?')" value="Borrar"
                                        class="btn btn-error form-control-sm">
                                </form>
                            </th>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
