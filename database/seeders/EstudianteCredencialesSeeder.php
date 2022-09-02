<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;

use App\Models\Estudiante;
use App\Models\Credencial;
use App\Models\Imagen;

class EstudianteCredencialesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Estudiante::create([
            'id' => 998,
            'idescuela' => 1,
            'nombre' => 'Ana',
            'apellido1' => 'López',
            'apellido2' => 'González',
            'curp' => 'BBBB990102HBSRNL06',
            'direccion' => 'N/A',
            'telefono' => 'N/A',
            'correo' => '123',
            'registroescolar' => '123',
        ]);

        Estudiante::create([
            'id' => 999,
            'idescuela' => 1,
            'nombre' => 'Jorge',
            'apellido1' => 'Armenta',
            'apellido2' => 'Atamoros',
            'curp' => 'AAAA990102HBSRNL06',
            'direccion' => 'N/A',
            'telefono' => 'N/A',
            'correo' => '123',
            'registroescolar' => '123',
        ]);

        Credencial::create([
            'codigo' => '837721',
            'user_id' => 999,
            'pre_curp' => null,
            'vigencia' => Carbon::now(),
        ]);

        Credencial::create([
            'codigo' => '294633',
            'user_id' => 998,
            'pre_curp' => null,
            'vigencia' => Carbon::now(),
        ]);

        Imagen::create([
            'curp' => 'BBBB990102HBSRNL06',
            'foto' => 'https://i.imgur.com/kciOAeo.png'
        ]);

        Imagen::create([
            'curp' => 'AAAA990102HBSRNL06',
            'foto' => 'https://i.imgur.com/3LgDz5a.png'
        ]);
    }
}
