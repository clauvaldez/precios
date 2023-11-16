<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Descarga extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'fecha',
        'role',
        // Otras columnas necesarias para tu lógica de descargas
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
