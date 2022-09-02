@extends('layouts.escuelas')

@section('content')
    <div class="container">


        <form action="{{ url('/imagenes/create') }}" method="get">
            <input type="Submit" value="Agregar Imagenes" class="btn btn-primary">
        </form>
        <br>

        <table class="table table-light">
            <thead class="table-light">
                <tr>
                    <th> # </th>
                    <th> CURP </th>
                    <th> foto </th>
                    <th> Acciones </th>
                </tr>
            </thead>


            <tbody>
                @foreach ($imagenes as $imagen)
               
                <tr>
                        <th>{{ $imagen->id }} </th>
                        <th> {{ $imagen->curp }} </th>
                        <th><img style="border-radius:15px;" src="{{ asset($imagen->foto) }} " width="70"></th>

                        <th class="d-flex flex-row">
                            <form action="{{ url('imagenes/' . $imagen->id . '/edit') }}" method="get">
                                @csrf
                                <input type="Submit" value="Vista previa" class="btn btn-primary">
                            </form>
                        </th>
                    </tr> 
               
                @endforeach
            </tbody>
        </table>

        <div class="span7 center">
                     {{ $imagenes->links() }}   
        </div>  

    </div>
@endsection
