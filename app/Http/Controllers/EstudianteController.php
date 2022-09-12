<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Escuela;
use App\Models\Imagen;

use Illuminate\Http\Request;
//use Maatwebsite\Excel\Excel;
use Excel;

use App\Imports\UsersImport;
use App\Http\Controllers\Validator;

use Illuminate\Pagination\Paginator;

use Illuminate\Support\Collection;

Use Session;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Storage;

use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Support\Facades\DB;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     *
     *
     */

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function index()
    {
        $datos['estudiantes'] = DB::table('estudiantes')
            ->whereNull('deleted_at')
            ->where('idescuela', Auth::user()->idescuela)
            ->paginate(50);
           


        return view('estudiantes.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $escuelas = Escuela::all();
        return view('estudiantes.create', compact('escuelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosestudiantes = request()->except('_token');

        if ($request->hasfile('documento')) {

            try {

            $path = $request->file('documento')->store('uplodas');

            $campos = [
                'curp' => 'unique:estudiantes,curp',
            ];

            $mensaje = [
                'unique' => 'El campo CURP no puede estar repetido',
            ];

            $this->validate($request, $campos, $mensaje);

            Excel::import(new UsersImport, $path, 'local', \Maatwebsite\Excel\Excel::XLSX);


            $datos['estudiantes'] = DB::table('estudiantes')
                ->whereNull('deleted_at')
                ->where('idescuela', Auth::user()->idescuela)
                ->paginate(50);

            return redirect()->route('estudiantes.index');

            }

            catch (\Illuminate\Database\QueryException $e) {
             
            

                Session::flash('message','Un CURP  ya fue registrado y no puede estar duplicado por favor verifica tu excel.');

                $datos['estudiantes'] = DB::table('estudiantes')
                ->whereNull('deleted_at')
                ->where('idescuela', Auth::user()->idescuela)
                ->paginate(50);

                 return redirect()->route('estudiantes.index');

              
            }



        } else {
            $campos = [
                'curp' => 'unique:estudiantes,curp',
            ];

            $mensaje = [
                'unique' => 'El campo CURP no puede estar repetido',
            ];

            $this->validate($request, $campos, $mensaje);

            if ($request->hasfile('foto')) {

                $imagen = $request->file('foto');

                $fotoma = new Imagen();
    
              

                $name = $datosestudiantes['curp'];
                
                $extension = $imagen->getClientOriginalExtension();

                 $name = $name.'.'.$extension;
    
                $rutacarpeta  ='storage/media/img/';
    
    
                $imagen->move($rutacarpeta,$name);
    
                $fotoma->foto = $rutacarpeta.$name;
    
                $datosestudiantes['foto'] = $fotoma->foto;



            }

           

            Estudiante::insert($datosestudiantes);

            $datos['estudiantes'] = DB::table('estudiantes')
                ->whereNull('deleted_at')
                ->where('idescuela', Auth::user()->idescuela)
                ->paginate(50);

            return view('estudiantes.index', $datos);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function show(Estudiante $estudiante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
      
        $estudiantes = Estudiante::findOrFail($id);
        return view('estudiantes.edit', compact('estudiantes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosEstudiante = request()->except(['_token', '_method']);

        if ($request->hasfile('foto')) {

            $imagen = $request->file('foto');

            $fotoma = new Imagen();


            $name = $datosEstudiante['curp'];
                
            $extension = $imagen->getClientOriginalExtension();

            $name = $name.'.'.$extension;

            $rutacarpeta  ='storage/media/img/';


            $imagen->move($rutacarpeta,$name);

            $fotoma->foto = $rutacarpeta.$name;

            $datosEstudiante['foto'] = $fotoma->foto;



        }


        Estudiante::where('id', '=', $id)->update($datosEstudiante);

        $datos['estudiantes'] = DB::table('estudiantes')
        ->whereNull('deleted_at')
        ->where('idescuela', Auth::user()->idescuela)
        ->paginate(50);

         return view('estudiantes.index', $datos);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ma = Estudiante::findOrFail($id);
        $ma->delete();

        return back()->with('notificacion', 'Escuela dada de Baja');
    }
}
