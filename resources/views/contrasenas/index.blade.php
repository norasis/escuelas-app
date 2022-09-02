@extends('layouts.escuelas')

@section('content')




    <div class="container">






        <table class="table table-light">
            <thead class="table-light">
                <tr>
                    <th> # </th>
                    <th> Nombre </th>
                    <th> Usuario </th>
                    <th> Email </th>
                    <th> Acciones </th>
                </tr>
            </thead>
          

            <tbody>
                @foreach ($users as $users)
                @if (Auth::user()->tipo == 'ADMINISTRADOR')
                    <tr>
                        <th>{{ $users->id }} </th>
                        <th> {{ $users->name }} </th>
                        <th> {{ $users->username }} </th>
                        <th> {{ $users->email }} </th>
                        <th class="d-flex flex-row">
                           <form action="{{ url('/contrasena/' . $users->id . '/edit') }}" method="get">
                                @csrf
                                <input type="Submit" value="CambiarContraseña" class="btn btn-primary">
                            </form>
                        </th>
                    </tr>
                @else 
                   @if ($users->id == Auth::user()->id) 
                   <tr>
                        <th>{{ $users->id }} </th>
                        <th> {{ $users->name }} </th>
                        <th> {{ $users->username }} </th>
                        <th> {{ $users->email }} </th>
                        <th class="d-flex flex-row">
                           <form action="{{ url('/contrasena/' . $users->id . '/edit') }}" method="get">
                                @csrf
                                <input type="Submit" value="CambiarContraseña" class="btn btn-primary">
                            </form>
                        </th>
                    </tr>
                    @endif
                @endif 
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
