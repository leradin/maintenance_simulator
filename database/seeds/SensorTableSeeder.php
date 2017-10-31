<?php

use Illuminate\Database\Seeder;

class SensorTableSeeder extends Seeder
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
	        'name' => 'GPS',
            'description' => 'Localizacion',
            'created_at' => $date,
            'updated_at' => $date
	    	),
	    	array(
	        'name' => 'GYRO',
            'description' => 'Orientación',
            'created_at' => $date,
            'updated_at' => $date
	    	),
	    	array(
	        'name' => 'AIS',
            'description' => 'Detección de blancos',
            'created_at' => $date,
            'updated_at' => $date
	    	),
	    	array(
	        'name' => 'RADAR',
            'description' => 'Deteccion de blancos',
            'created_at' => $date,
            'updated_at' => $date
	    	),
	    	array(
	        'name' => 'ECOSONDA',
            'description' => 'Medición de profundidad',
            'created_at' => $date,
            'updated_at' => $date
	    	),
	    	array(
	        'name' => 'ANEMOMETRO',
            'description' => 'Velocidad de viento',
            'created_at' => $date,
            'updated_at' => $date
	    	)
    	);

    	foreach($data as $sensor)
	 	{
            \DB::table('sensors')->insert($sensor);
	 	}
    }
}
