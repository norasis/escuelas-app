@extends('layouts.escuelas')

@section('content')
    <div class="container">
        <h2>Cambiar  Contraseña </h2>
        <br>


      

        <form action="{{ url('/contrasena/' . $users->id) }}" method="post">

     
            @csrf
            {{ method_field('PATCH')}}

            <div class="row">

          

                <div class="col">

             
                 
                    <br>
                    <label form="name"> Nombre </label>
                    <input class="form-control" type="text" name="name" value="{{ $users->name }}" id="name" size="60" readonly/>

                  
                    <br>
                    <label form="username"> Usuario </label>
                    <input class="form-control" type="text" name="username" value="{{ $users->username }}" id="username" size="60" readonly/>


                    <br>
                    <label form="email"> Email </label>
                         <input class="form-control" type="text" name="Email" id="email" value="{{ $users->email }}" size="62" readonly/>
                </div>
                <div class="col">
                  
              
                
                  <input class="form-control" id="idescuela" type="hidden" name="idescuela" value="{{ $users->idescuela }}" readonly>


                    <br>
                  <label form="Pasword">Ingrese el nuevo Pasword</label>
                  <input class="form-control" id="password" type="password" name="password" required>

                 
                

            
                  <br>
                  <br>
                  <button class="btn btn-primary" type="button" onclick="mostrarContrasena()">Mostrar/Ocultar Contraseña</button>


                    <br>
                    <br>
                    <br>
                    <input class="form-control btn btn-primary" type="submit" value="Cambiar Contraseña" />
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
