<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $fillable = [
        'nombre',
        'unidad_medida',
        'precio_referencial',
        'fecha_ultima_modificacion',
        'imagen',
        'categoria_id', // Nuevo campo para la categoría
    ];

    //nombre de la tabla
    protected $table = 'materiales';

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
