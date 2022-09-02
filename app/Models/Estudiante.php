<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Imagen;

class Estudiante extends Model
{
    use HasFactory,SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'nombre',
        'apellido1',
        'apellido2',
        'curp',
        'direccion',
        'telefono',
        'correo',
        'registroescolar',
        'idescuela',
    ];

    public function imagen ()
    {
        return $this->hasOne(Imagen::class, 'curp', 'curp');
    }
}

