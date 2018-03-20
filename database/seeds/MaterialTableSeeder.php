<?php

use Illuminate\Database\Seeder;

class MaterialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon\Carbon::now();
    	$data = array(
    		array(
	        'name' => 'No-break para microcomputadoras (suministros informáticos)',
            'description' => 'UPS de Rack 2.2 kVA UPS SmartPro 2U 19" de profundidad 2.2kVA, Voltaje de entrada: 220VAC Voltaje de salida: 220 VAC, Tipo de toma corrientes de salida: C13.',
            'created_at' => $date,
            'updated_at' => $date
	    	),
	    	array(
	        'name' => 'Tarjeta de red (suministros informáticos)',
            'description' => 'Tarjeta Ethernet Shield para tarjeta UNO',
            'created_at' => $date,
            'updated_at' => $date
	    	),
            array(
            'name' => 'Manual de Usuario SEDAM',
            'description' => '',
            'created_at' => $date,
            'updated_at' => $date
            ),
            array(
            'name' => 'Máquina Apoyo/Diagnóstico con conexión a red e Hyperterminal instalado',
            'description' => '',
            'created_at' => $date,
            'updated_at' => $date
            )
    	);

    	foreach($data as $material)
	 	{
            \DB::table('materials')->insert($material);
	 	}
    }
}
