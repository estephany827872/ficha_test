<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ficha extends Model
{
    use HasFactory;

    protected $table = 'fichas';

    protected $primaryKey = 'no_recibo';

    protected $keyType = 'integer';

    protected $fillable = [
        'no_recibo',
        'fecha_pago',
        'fecha_registro',
        'instituto',
        'apellido_paterno',
        'apellido_materno',
        'nombre_aspirante',
        'nip',
        'fecha_nacimiento',
        'sexo',
        'nacionalidad',
        'especifique_extranjero',
        'curp',
        'carrera_opcion_1',
        'carrera_opcion_2',
        'entidad_federativa_prepa',

    ];

    protected $casts = [
        'fecha_pago' => 'date',
        'fecha_registro' => 'date',
        'fecha_nacimiento' => 'date',
    ];

}
