@extends('layouts.escuelas')

@section('content')
    <div class="container">
      <h2>Editar datos de "{{ $estudiantes->nombre }}"</h2>
        <form action="{{ url('/estudiantes/' . $estudiantes->id) }}" method="post" enctype="multipart/form-data">
            <div class="row">
               <div class="col">
                  @csrf
                  {{ method_field('PATCH') }}


               

                  <br>
                  <label form="nombre"> Nombre </label>
                  <input class="form-control" type="text" name="nombre" value="{{ $estudiantes->nombre }}" id="nombre" size="60" required />

                  <br>
                  <label form="apellido1"> Apellido1 </label>
                  <input class="form-control" type="text" name="apellido1" value="{{ $estudiantes->apellido1 }}" id="apellido1" size="59"
                     required />

                  <br>
                  <label form="apellido2"> Apellido2 </label>
                  <input class="form-control" type="text" name="apellido2" value="{{ $estudiantes->apellido2 }}" id="apellido2" size="59"
                     required />

                  <br>
                  <label form="curp"> CURP </label>
                  <input class="form-control" type="text" name="curp" value="{{ $estudiantes->curp }}" id="curp" size="62" required />

                  <br> 
                  <img src="{{ asset($estudiantes->foto) }}" width="400"> 

                  <br>
                        <label form="foto"> Foto </label>
                        <input class="form-control" type="file" name="foto" class="form-control-file" id="foto" accept="image/jpg">
                        <div class="form-text">Solo se aceptan imágenes en formato JPG.</div>
              

             

               </div>
               <div class="col">
                  <br>
                  <label form="direccion"> Direccion </label>
                  <input class="form-control" type="text" name="direccion" value="{{ $estudiantes->direccion }}" id="direccion" size="60" required/>

                  <br>
                  <label form="telefono"> Telefono </label>
                  <input class="form-control" type="tel" name="telefono" id="telefono"  value="{{ $estudiantes->telefono }}"  pattern="[0-9]{10}" maxlength="10" size="60" required />

                  <br>
                  <label form="correo"> Correo </label>
                  <input class="form-control" type="email" name="correo" style="text-transform:lowercase;" value="{{ $estudiantes->correo }}" id="correo" size="62" required />

                  <br>
                  <label form="registroescolar"> Clave de Registro Escolar</label>
                  <input class="form-control" type="text" name="registroescolar" value="{{ $estudiantes->registroescolar }}" id="registroescolar"
                     size="47" required />

            
                    <br>
                  <br>
                  <input class="form-control btn btn-primary" type="submit" value="Editar Datos"/>
               </div>
            </div>
        </form>
    </div>
@endsection

