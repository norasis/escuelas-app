@extends('layouts.escuelas')

@section('content')




    <div class="container">




        <form action ="{{ url('/usuario/create')}}" method = "get">
            <input type = "Submit"    value = "Agregar Usuario" class="btn btn-primary">
        </form>
        <br>



        <table class="table table-light">
            <thead class="table-light">
                <tr>
                    <th> # </th>
                    <th> Nombre </th>
                    <th> Usuario </th>
                    <th> Tipo </th>
                    <th> Email </th>
                    <th> Acciones </th>
                </tr>
            </thead>
          

            <tbody>
                @foreach ($users as $users)
                    <tr>
                        <th>{{ $users->id }} </th>
                        <th> {{ $users->name }} </th>
                        <th> {{ $users->username }} </th>
                        <th> {{ $users->tipo }} </th>
                        <th> {{ $users->email }} </th>
                        <th class="d-flex flex-row">
                            <form action="{{ url('/usuario/' . $users->id . '/edit') }}" method="get">
                                @csrf
                                <input type="Submit" value="Editar" class="btn btn-primary">
                            </form>
                            <form action="{{ url('usuario/' . $users->id) }}" method="post">
                                @csrf
                                {{ method_field('DELETE') }}
                                <input type="Submit" onclick="return confirm('Esta seguro que desea eliminar el usuario?')"
                                    value="Borrar" class="btn btn-warning">
                            </form>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
