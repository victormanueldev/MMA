<?php

use Illuminate\Database\Seeder;

class Vacnuas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $vacunas    = [
            '0' => [
                'nombre_vacuna'         => 'Puppy',
                'frecuencia_aplicacion' => 'quincenal',
                'etiqueta'              => 'puppy.jpg' 
            ],
            '1' => [
                'nombre_vacuna'         => 'Quintuple',
                'frecuencia_aplicacion' => 'quincenal',
                'etiqueta'              => 'quintuple.jpg' 
            ],
            '2' => [
                'nombre_vacuna'         => 'Séxtuple',
                'frecuencia_aplicacion' => 'quincenal',
                'etiqueta'              => 'sextuple.jpg' 
            ],
            '3' => [
                'nombre_vacuna'         => 'KC',
                'frecuencia_aplicacion' => 'quincenal',
                'etiqueta'              => 'kc.jpg' 
            ],
            '4' => [
                'nombre_vacuna'         => 'Triple Viral',
                'frecuencia_aplicacion' => 'quincenal',
                'etiqueta'              => 'tvf.jpg' 
            ],
            '5' => [
                'nombre_vacuna'         => 'Leucemia',
                'frecuencia_aplicacion' => 'quincenal',
                'etiqueta'              => 'leucogen.jpg' 
            ],
            '6' => [
                'nombre_vacuna'         => 'Vacuna Anual',
                'frecuencia_aplicacion' => 'anual',
                'etiqueta'              => 'anualP.jpg' 
            ]
        ];

        DB::table('vacunas')->insert($vacunas);
    }
}
