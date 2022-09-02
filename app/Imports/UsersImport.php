<?php

namespace App\Imports;


use App\Models\Estudiante;

use Illuminate\Support\Facades\Auth;


use App\Models\User;

use Illuminate\Support\Collection;

use Maatwebsite\Excel\Concerns\ToCollection;

use Maatwebsite\Excel\Concerns\WithHeadingRow;

use Illuminate\Support\Facades\Validator;

class UsersImport implements ToCollection, WithHeadingRow



{

    /**

    * @param array $row

    *

    * @return \Illuminate\Database\Eloquent\Model|null

    */

   public function collection(Collection $rows)

    {
        foreach ($rows as $row) {
            Estudiante::create([
                'idescuela'=> Auth::user()->idescuela,
                'nombre'=> $row['nombre'],
                'apellido1'=> $row['apellido1'],
                'apellido2'=> $row['apellido1'],
                'curp'=> $row['curp'],
                'registroescolar'=> $row['registroescolar'],
            ]);

        }

    }

  

}
