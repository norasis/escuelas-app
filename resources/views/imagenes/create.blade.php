@extends('layouts.escuelas')

@section('content')
    <div class="card-body">

        <div class="form-group">


            <form action="{{ url('/imagenes') }}" method="POST" enctype="multipart/form-data">

                @csrf

                @if (count($errors) > 0)
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li> {{ $error }} </li>
                        @endforeach
                    </ul>
                @endif

                <div class="row">
                    <div class="col-8">
                        <input class="form-control" type="file" name="foto[]" class="form-control-file" id="foto" multiple accept="image/jpg">
                        <div class="form-text">Solo se aceptan imágenes en formato JPG.</div>
                    </div>
                    <div class="col-4">
                        <input type="submit" value="Añadir Imagenes solo jpg" class="btn btn-primary" />
                    </div>
                </div>

            </form>


        </div>


    </div>
@endsection
