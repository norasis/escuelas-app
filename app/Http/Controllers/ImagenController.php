<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use App\Models\Estudiante;
use Illuminate\Http\Request;
//use Maatwebsite\Excel\Excel;
use Excel;

use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;

use App\Http\Controllers\Str;

use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Support\Facades\DB;

class ImagenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['imagenes'] = DB::table('estudiantes')
        ->whereNull('deleted_at')
        ->where('idescuela', Auth::user()->idescuela)
        ->paginate(50);
 
        return view('imagenes.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('imagenes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
         
        $datosimagenes = request()->except('_token');

      
        if  ($request->hasfile('foto')){

        

          $imagenes = $request->file('foto');

         


         
            foreach($imagenes as $imagen){


              
            
                $fotoma = new Imagen();

                $name = $imagen->getClientOriginalName();
                
                $extension = $imagen->getClientOriginalExtension();

                $rutacarpeta  ='public/media/img/';

          

                

                $imagen->move($rutacarpeta,$name);

              
        
            

               $fotoma->foto = $rutacarpeta.$name;
               
            

                 
               
                $resultado = substr($name,0,18);
               
        
            

                $fotoma->curp = $resultado;

      
        
               
        

                DB::table('estudiantes')
                ->where('curp', $fotoma->curp)
                ->update(['foto' => $fotoma->foto]);

                 
           
                
             

             }

            

        }

        //muestra las fotos de idescuela

        $datos['imagenes'] = DB::table('estudiantes')
        ->whereNull('deleted_at')
        ->where('idescuela', Auth::user()->idescuela)
        ->paginate(50);
 
        return view('imagenes.index',$datos);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Imagen  $imagen
     * @return \Illuminate\Http\Response
     */
    public function show(Imagen $imagen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Imagen  $imagen
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $imagenes = Estudiante::findOrFail($id);
        return view('imagenes.edit',compact('imagenes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Imagen  $imagen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Imagen $imagen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Imagen  $imagen
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ma = Imagen::findOrFail($id);
        $ma->delete();
        
       return back()->with('notificacion','Imagen dada de Baja');
    }
}
