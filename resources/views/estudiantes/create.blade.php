@extends('layouts.escuelas')

@section('content')
    <div class="container">
        <h2>Registrar estudiante</h2>
        <h4>Verifique que no haya CURP repetidos</h4>
        
        <br>
        <h4>Registro de Padron de Estudiantes</h4>
        <form action="{{ url('/estudiantes') }}" method="POST" enctype="multipart/form-data">
            
            @csrf
            @if(Session::has('message'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                         {{Session::get('message')}}
                    </div>
            @endif

            <input class="form-control" type="hidden" name="idescuela" value="{{ Auth::user()->idescuela }}" id="idescuela" size="60" required />
           
            <div class="row">
                <div class="col-8">
                    <input class="form-control" type="file" name="documento" required />
                </div>
                <div class="col-4">
                    <input type="submit" value="Importar Datos Excel" class="form-control btn btn-primary" />
                </div>
            </div>
        </form>
        <br>
        <br>
        <h4>Registro de Estudiante Individual</h4>
        <form action="{{ url('/estudiantes') }}" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col">
                    @csrf
                    @if (count($errors) > 0)
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li> {{ $error }} </li>
                            @endforeach
                        </ul>
                    @endif


                 
                  
                  <input class="form-control" type="hidden" name="idescuela" value="{{ Auth::user()->idescuela }}" id="idescuela" size="60" required />

   
               


                    <br>
                    <label form="nombre"> Nombre </label>
                    <input class="form-control" type="text" name="nombre" id="nombre" size="60" required />


                    <br>
                    <label form="apellido1">Apellido1</label>
                    <input class="form-control" type="text" name="apellido1" id="apellido1" size="59" required />

                    <br>
                    <label form="apellido2"> Apellido2 </label>
                    <input class="form-control" type="text" name="apellido2" id="apellido2" size="59" required />

                    <br>
                    <label form="curp"> CURP </label>
                    <input class="form-control" type="text" name="curp" id="curp" size="62" required />

                    <br>
                        <label form="foto"> Foto </label>
                        <input class="form-control" type="file" name="foto" class="form-control-file" id="foto" accept="image/jpg">
                        <div class="form-text">Solo se aceptan imágenes en formato JPG.</div>
                  

                </div>
                <div class="col">
                    <br>
                    <label form="direccion"> Direccion </label>
                    <input class="form-control" type="text" name="direccion" id="direccion" size="60" required />

                    <br>
                    <label form="telefono"> Telefono </label>
                    <input class="form-control" type="tel" name="telefono" id="telefono" pattern="[0-9]{10}"  maxlength="10"  size="60" required />

                    <br>
                    <label form="correo"> Correo </label>
                    <input class="form-control" type="email" style="text-transform:lowercase;" name="correo" id="correo"
                        size="62" required />


                    <br>
                    <label form="registroescolar"> Clave de Registro Escolar</label>
                    <input class="form-control" type="text" name="registroescolar" id="registroescolar" size="47" required />

                    <br>
                    <br>
                    <input class="form-control btn btn-primary" type="submit" value="Guardar Datos" class="btn btn-success" />

                </div>
            </div>
            @csrf
        </form>

    </div>

@endsection

<script>
       $('div.alert').delay(3000).slideUp(300);
</script>
