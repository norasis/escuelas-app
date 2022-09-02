@extends('layouts.escuelas')

@section('content')
    <div class="card-body">
        {{-- <form action="{{ url('/imagenes/' . $imagenes->id) }}" method="post">
            @csrf
            {{ method_field('PATCH') }}
           <br>
            <label form="curp"> CURP </label>
            <input type="text" name="curp" readonly="true" value="{{ $imagenes->curp }}" id="curp" size="60" />
            <br>
            <img src="{{ asset($imagenes->foto) }} " width="500">
        </form> --}}
        <div class="text-center" >
             <img style="border-radius:15px;" src="{{ asset($imagenes->foto) }} " width="500">
             <br>
             <br>
             <h4>{{ $imagenes->curp }}</h4>
        </div>
    </div>
@endsection
