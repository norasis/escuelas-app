<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'Admin',
            'idescuela' => '0',
            'name' => 'Admin',
            'email' => 'test@lapaz.gob.mx',
            'tipo' => 'ADMINISTRADOR',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('123')
        ]);
    }
}
