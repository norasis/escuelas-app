<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;


use App\Models\Empleado;
use Illuminate\Http\Request;




class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    use  SoftDeletes;
 


    public function index()
    {
         
    

        $datos['empleados'] = DB::table('empleados')
        ->whereNull('deleted_at')
        ->get();

        return  view('empleado.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('empleado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
       $datosEmpleado = request()->except('_token');
       Empleado::insert($datosEmpleado);
       return redirect('empleado');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $empleado = Empleado::findOrFail($id);
        return view('empleado.edit',compact('empleado'));
          

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        $datosEmpleado = request()->except(['_token','_method']);
        Empleado::where('id', '=', $id)->update($datosEmpleado);

        return redirect()->route('empleado.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
         $ma = Empleado::findOrFail($id);
         $ma->delete();
         return redirect()->route('empleado.index');


    }
}
