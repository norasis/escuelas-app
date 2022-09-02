@extends('layouts.escuelas')

@section('content')
    <div class="container">
          <div class="row justify-content-center">
               <div class="col-8">
                    <form action="{{ url('/usuario/' . $user->id) }}" method="post">
                    @csrf
                    {{ method_field('PATCH') }}

                    
                    
             
                    <label form = "Escuela"> Escuela </label> 
                    <select name="idescuela"  id="idescuela">
                         @foreach($escuelas as $escuela) 
                              <option value="{{ $escuela['id']}}">{{$escuela['id'].'-'.$escuela['nombre']}}</option>
                         @endforeach
                    </select>


                    <br>
                    <div class="form-group">
                         <label form="name"> Nombre </label>
                         <input class="form-control" type="text" name="name" value="{{ $user->name }}" id="name" size="60" />
                    </div>

                    <br>
                    <div class="form-group">
                         <label form="username"> Usuario </label>
                         <input class="form-control" type="text" name="username" value="{{ $user->username }}" id="username" size="60" />
                    </div>
          
                    <br>
                    <div class="form-group">
                         <label form="tipo"> Tipo </label>
                         <input class="form-control" type="text" name="tipo" value="{{ $user->tipo }}" id="tipo" size="53" />
                    </div>
          
                    <br>
                    <div class="form-group">
                         <label form="email"> Email </label>
                         <input class="form-control" type="text" name="Email" id="email" value="{{ $user->email }}" size="62" />
                    </div>

          
                    <br>
                    <input class="btn btn-primary form-control" type="submit" value="Guardar cambios" />
                    </form>
               </div>
          </div>
     </div>
@endsection
