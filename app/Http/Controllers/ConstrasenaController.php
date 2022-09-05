<?php



namespace App\Http\Controllers;

use App\Models\usuario;
use App\Models\Estudiante;
use App\Models\Escuela;

use App\Models\constrasena;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


use App\Models\User;

use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;


class ConstrasenaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
   

        
        $datos['users'] = DB::table('users')
        ->whereNull('deleted_at')
        ->get();
 
     
       
 
        return view('contrasenas.index', $datos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\constrasena  $constrasena
     * @return \Illuminate\Http\Response
     */
    public function show(constrasena $constrasena)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\constrasena  $constrasena
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {

        $users = User::findOrFail($id);
        return view('contrasenas.edit',compact('users'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\constrasena  $constrasena
     * @return \Illuminate\Http\Response
     * 
     * 
     * 
     * 
     */

   
    public function update(Request $request, $id)
    {
      

        $datosusuario = request()->except(['_token','_method']);
        $datosusuario['password'] = Hash::make($datosusuario['password']);

        //hola
       

        User::where('id', '=', $id)->update($datosusuario);

        $datos['estudiantes'] = DB::table('estudiantes')
        ->whereNull('deleted_at')
        ->get();
    
        return view('estudiantes.index',$datos);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\constrasena  $constrasena
     * @return \Illuminate\Http\Response
     */
    public function destroy(constrasena $constrasena)
    {
        //
    }
}
