@extends('layouts.escuelas')

@section('content')
    <div class="container">


        <form action="{{ url('/usuario') }}" method="POST">
            @csrf
            @if (count($errors) > 0)
                <ul>
                    @foreach ($errors->all() as $error)
                        <li> {{ $error }} </li>
                    @endforeach
                </ul>
            @endif

            <div class="row">
               <div class="col">
                  <br>
                  <label form="Escuela"> Escuela </label>
                  <select class="form-control" name="idescuela" id="idescuela"  type="idescuela" required >
                     @foreach ($escuelas as $escuela)
                        <option value="{{ $escuela['id'] }}">{{ $escuela['id'] . '-' . $escuela['nombre'] }}</option>
                     @endforeach
                  </select>

                  <br>
                  <label form="name"> Nombre </label>
                  <input class="form-control" type="text" name="name" id="name" size="60" required />

                  <br>
                  <label form="username"> Usuario </label>
                  <input class="form-control" type="text" name="username" id="username" size="60" required />


                  <br>
                  <label form="tipo"> Tipo </label>

                  <select class="form-control" name="tipo" type="tipo" id="tipo" required>
                     <option>ADMINISTRADOR</option>
                     <option>CAPTURISTA</option>
                  </select>

               </div>
               <div class="col">

                  <br>
                  <label form="email"> Correo </label>
                  <input class="form-control" type="email" style="text-transform:lowercase;" name="email" id="email" size="62" />

                  <br>
                  <label form="Pasword"> Pasword</label>
                  <input class="form-control" id="password" type="password" name="password" required>

                  <br>
                  <br>
                  <button class="btn btn-primary" type="button" onclick="mostrarContrasena()">Mostrar/Ocultar Contraseña</button>

                  <br>
                  <br>
                  <br>
                  <input type="submit" value="Guardar Datos" class="btn btn-primary form-control" />
               </div>
            </div>
        </form>



    </div>
@endsection

<script>
  function mostrarContrasena(){
      var tipo = document.getElementById("password");
      if(tipo.type == "password"){
          tipo.type = "text";
      }else{
          tipo.type = "password";
      }
  }
</script>
