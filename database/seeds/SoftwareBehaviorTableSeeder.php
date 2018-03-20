<?php

use Illuminate\Database\Seeder;

class SoftwareBehaviorTableSeeder extends Seeder
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
            'name' => 'indicadores de actividad',
            'description' => 'en la barra indicadora de actividad la que se muestra en el panal superior derecho, la casilla del indicador del sensor del gps no presenta actividad(no existe parpadeo del led indicador)',
            'created_at' => $date,
            'updated_at' => $date
            ),
             array(
            'name' => 'indicadores de actividad',
            'description' => 'en la barra indicadora de actividad la que se muestra en el panal superior derecho, la casilla del indicador del sensor del ANEMOMETRO no presenta actividad(no existe parpadeo del led indicador)',
            'created_at' => $date,
            'updated_at' => $date
            ),
            array(
            'name' => 'indicadores de actividad',
            'description' => 'en la barra indicadora de actividad la que se muestra en el panal superior derecho, la casilla del indicador del sensor del AIS no presenta actividad(no existe parpadeo del led indicador)',
            'created_at' => $date,
            'updated_at' => $date
            ),
            array(
            'name' => 'indicadores de actividad',
            'description' => 'en la barra indicadora de actividad la que se muestra en el panal superior derecho, la casilla del indicador del sensor del GYRO no presenta actividad(no existe parpadeo del led indicador)',
            'created_at' => $date,
            'updated_at' => $date
            ),
            array(
            'name' => 'indicadores de actividad',
            'description' => 'en la barra indicadora de actividad la que se muestra en el panal superior derecho, la casilla del indicador del sensor del RADAR no presenta actividad(no existe parpadeo del led indicador)',
            'created_at' => $date,
            'updated_at' => $date
            ),
            array(
            'name' => 'indicadores de actividad',
            'description' => 'En la barra indicadora de actividad que muestra en el panel superior derecho, la casilla del sensor del ECO  no presenta  actividad (No existe Parpadeo de led indicador)',
            'created_at' => $date,
            'updated_at' => $date
            ),
            array(
            'name' => 'indicadores de actividad',
            'description' => 'En el panel de información general de la unidad propia no se visualizan los datos en tiempo real, puesto que tiene los datos preconfigurados en el archivo SENSOR_SIMULATION. Xml',
            'created_at' => $date,
            'updated_at' => $date
            ),
            array(
            'name' => 'indicadores de actividad',
            'description' => 'En la barra indicadora de actividad que muestra en el panel superior derecho, "los indicadores de actividad se encuentran sin luminosidad en tono verde',
            'created_at' => $date,
            'updated_at' => $date
            )
        );
        
        foreach($data as $softwareBehavior)
	 	{
            \DB::table('software_behaviors')->insert($softwareBehavior);
	 	}
    }
}
