<?php

namespace App\Http\Controllers;

use App\Models\Escuela;
use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

use App\Models\User;

use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class EscuelaController extends Controller
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
        $datos['escuelas'] = DB::table('escuelas')
        ->whereNull('deleted_at')
        ->get();
 
        return view('escuelas.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('escuelas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosescuela = request()->except('_token');
        Escuela::insert($datosescuela);

        $datos['escuelas'] = DB::table('escuelas')
        ->whereNull('deleted_at')
        ->get();
 
        return view('escuelas.index',$datos);

       

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Escuela  $escuela
     * @return \Illuminate\Http\Response
     */
    public function show(Escuela $escuela)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Escuela  $escuela
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $escuelas = Escuela::findOrFail($id);
        return view('escuelas.edit',compact('escuelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Escuela  $escuela
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $escuelas = request()->except(['_token','_method']);
        Escuela::where('id', '=', $id)->update($escuelas);

        $datos['escuelas'] = DB::table('escuelas')
        ->whereNull('deleted_at')
        ->get();
 
        return view('escuelas.index',$datos);
       
    }

   
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Escuela  $escuela
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ma = Escuela::findOrFail($id);
         $ma->delete();
         
        return back()->with('notificacion','Escuela dada de Baja');
    }
}
