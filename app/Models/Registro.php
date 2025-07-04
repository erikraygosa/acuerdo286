<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    use HasFactory;

    protected $table = 'registros';

    protected $fillable = [
        'nombres',
        'apellidos',
        'curp',
        'folio',
        'escuela',
        'cct',
        'calificacion',
        'clave',
        'secretaria',
        'fecha',
        'imagen',
        'servicioed',
        'estudiosa',
        'fechaev'
    ];
}
