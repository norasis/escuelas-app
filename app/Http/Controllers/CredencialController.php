<?php

namespace App\Http\Controllers;

use App\Models\Credencial;
use App\Models\Estudiante;

use Illuminate\Http\Request;
use Carbon\Carbon;

class CredencialController extends Controller
{
    public function store (Request $request)
    {
        $curp = $request->input('curp');

        if ($curp == null) {
            return response()->json([
                'error' => true,
                'code' => 'CURP',
                'message' => 'No se está enviando la curp'
            ]);
        }

        $estudiante = Estudiante::where('curp', $curp)->with('imagen')->first();
        $credencial = Credencial::where('pre_curp', $curp)->first();

        // no hay pre-registro de la curp, ni de la escuela
        if ($estudiante == null && $credencial == null) {
            $nueva_credencial = Credencial::create([
                'codigo' => rand(100000, 999999),
                'user_id' => null,
                'pre_curp' => $curp,
                'vigencia' => Carbon::tomorrow(),
            ]);
            return response()->json([
                'error' => false,
                'code' => 'ESPERANDO_REGISTRO_DE_USUARIO',
                'credencial' => $nueva_credencial
            ]);
        }

        if ($estudiante != null) {
            $credencial = Credencial::create([
                'codigo' => rand(100000, 999999),
                'user_id' => $estudiante['id'],
                'vigencia' => Carbon::tomorrow(),
            ]);

            // attach estudiante a su credencial
            $credencial['estudiante'] = $estudiante;

            return response()->json([
                'error' => false,
                'code' => 'SUCCESS',
                'credencial' => $credencial
            ]);
        }

        // hay pre-registro de la curp, pero no de la escuela
        if ($credencial != null) {
            return response()->json([
                'error' => false,
                'code' => 'ESPERANDO_REGISTRO_DE_USUARIO',
                'credencial' => $credencial
            ]);
        }
    }

    public function verPorCodigo ($codigo)
    {
        $credencial = Credencial::where('codigo', $codigo)
        ->with('estudiante', function ($estudiante) {
            $estudiante->with('imagen');
        })->first();

        if ($credencial == null) {
            return response()->json([
                'error' => true,
                'code' => 'CREDENCIAL_NO_ENCONTRADA',
                'message' => 'La cerdencial no se encuentra o está vencida'
            ]);
        }

        return response()->json([
            'error' => false,
            'code' => 'SUCCESS',
            'credencial' => $credencial
        ]);
    }

    public function verPorCurp ($curp)
    {
        $estudiante = Estudiante::where('curp', $curp)->with('imagen')->first();
        $credencial = Credencial::where('user_id', $estudiante['id'])->first();

        if ($credencial == null) {
            return response()->json([
                'error' => true,
                'code' => 'CREDENCIAL_NO_ENCONTRADA',
                'message' => 'La cerdencial no se encuentra o está vencida'
            ]);
        }

        $credencial['estudiante'] = $estudiante;

        return response()->json([
            'error' => false,
            'code' => 'SUCCESS',
            'credencial' => $credencial
        ]);
    }
}
