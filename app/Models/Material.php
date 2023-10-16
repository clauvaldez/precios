<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;
    protected $table = 'materiales';

    protected $fillable = [
        'nombre',
        'unidad_medida',
        'precio_referencial',
        'fecha_ultima_modificacion',
        'imagen', // Si deseas permitir la asignación masiva de la columna 'imagen'
    ];

}
