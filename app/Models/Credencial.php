<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Estudiante;

class Credencial extends Model
{
    protected $table = 'credenciales';

    protected $fillable = [
        'codigo',
        'user_id',
        'pre_curp',
        'vigencia',
    ];

    use HasFactory;

    public function estudiante () {
        return $this->hasOne(Estudiante::class, 'id', 'user_id');
    }
}
