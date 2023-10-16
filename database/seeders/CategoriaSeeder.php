<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    public function run()
    {
        $categorias = [
            'ABERTURAS',
            'AISLANTES ACÚSTICOS METALICOS',
            'AISLANTES TÉRMICOS',
            'ALAMBRES',
            'CAL',
            'CARPINTERÍA',
            'CERÁMICA ROJA',
            'CERCO ELÉCTRICO',
            'CHAPAS',
            'CIMIENTOS',
            'CLIMATIZACIÓN',
            'CONSTRUCCIÓN',
            'CONTENEDORES',
            'CORTINAS',
            'DRENAJES',
            'ELECTRICIDAD',
            'ENCOFRADOS',
            'ESTRUCTURAS',
            'FUMIGACIONES',
            'GAVIONES',
            'HERRAJES',
            'HERRAMIENTAS',
            'HERRERÍA',
            'HIDRÓFUGOS',
            'HIERROS',
            'HORMIGÓN',
            'IMPERMEABILIZANTES',
            'LABORATORIO DE ENSAYOS',
            'LOCALES',
            'LOSA PREFABRICADA',
            'MADERA',
            'MALLA ELECTRO SOLDADA',
            'MARMOLES',
            'MEMBRANA LIQUIDA',
            'MEMBRANAS',
            'METAL DESPLEGADO AUTOMÁTICAS',
            'PIEDRAS',
            'PILOTES',
            'PINTURAS',
            'PISOS',
            'PISOS VINILICOS',
            'PORTONES A CONTROL REMOTO',
            'PREVENCION',
            'PUERTAS',
            'PUERTAS SANITARIAS',
            'REVESTIMIENTOS',
            'SEGURIDAD',
            'SELLADORES',
            'SEGUROS',
            'SISTEMAS DE RIEGO',
            'SOBREELEVADOS',
            'TECHOS',
            'TOPOGRAFIA',
            'TRABAJO EN SECO',
            'TUBERIAS',
            'VIDRIOS',
        ];

        foreach ($categorias as $categoria) {
            Categoria::create(['nombre' => $categoria]);
        }
    }
}
