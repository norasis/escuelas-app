<?php

namespace App\Http\Controllers;

use App\Models\usuario;
use App\Models\Estudiante;
use App\Models\Escuela;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


use App\Models\User;

use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use  SoftDeletes;
    protected $dates = ['deleted_at'];

    public function index()


    {
        $datos['users'] = DB::table('users')
        ->whereNull('deleted_at')
        ->get();
 
        return view('usuario.index', $datos);

     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $escuelas = Escuela::all();
       
        return view('usuario.create',compact('escuelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $campos = [
            'email'=> 'unique:users,email',
      ];

      $mensaje = [
          'unique' => 'El campo EMAIL no puede estar repetido',    
      ];

      $this->validate($request,$campos,$mensaje);
    

        $datosusuario = request()->except('_token');
        $datosusuario['password'] = Hash::make($datosusuario['password']);

        
        User::insert($datosusuario);

        $datos['estudiantes'] = DB::table('estudiantes')
        ->whereNull('deleted_at')
        ->get();
    
        return view('estudiantes.index',$datos);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $escuelas = Escuela::all();
       $user = User::findOrFail($id);
       return view('usuario.edit',compact('user','escuelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        $datosUsuario = request()->except(['_token','_method']);
        User::where('id', '=', $id)->update($datosUsuario);

        return redirect()->route('usuario.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ma = User::findOrFail($id);
        $ma->delete();
        
        return back()->with('notificacion','Usuario dada de Baja');
    }
}
