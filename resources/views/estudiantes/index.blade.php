@extends('layouts.escuelas')

@section('content')
    <div class="container">
  
        <form action="{{ url('/estudiantes/create') }}" method="get">
            <input type="Submit" value="Agregar Estudiante" class="btn btn-primary">
        </form>
        <br>

        <table class="table table-light">
            <thead class="table-light">
                <tr>
                    <th> # </th>
                    <th> Nombre </th>
                    <th> Apellido1 </th>
                    <th> Apellido2 </th>
                    <th> CURP </th>
                    <th> Registro Escolar </th>
                    <th> Acciones </th>
                </tr>
            </thead>


            <tbody>
                @foreach ($estudiantes as $estudiante)
               
                   <tr>

                  

<th>{{ $estudiante->id }} </th>
<th> {{ $estudiante->nombre }} </th>
<th> {{ $estudiante->apellido1 }} </th>
<th> {{ $estudiante->apellido2 }} </th>
<th> {{ $estudiante->curp }} </th>
<th> {{ $estudiante->registroescolar }} </th>
<th class="d-flex flex-row">
    <form action="{{ url('estudiantes/' . $estudiante->id . '/edit') }}" method="get">
        @csrf
        <input type="Submit" value="Editar" class="btn btn-primary">
    </form>
    <form action="{{ url('estudiantes/' . $estudiante->id) }}" method="post">
        @csrf
        {{ method_field('DELETE') }}
        <input type="Submit"
            onclick="return confirm('Esta seguro que desea eliminar el estudiante?')" value="Borrar"
            class="btn btn-warning">
        </form>
            @endforeach

    
</th>

</tr>
                               


            </tbody>
        </table>
        
        <div class="span7 center">
                     {{ $estudiantes->links() }}   
        </div>  

      
    </div>

      

@endsection
