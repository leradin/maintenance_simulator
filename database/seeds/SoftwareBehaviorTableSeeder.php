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
            )

        );
        
        foreach($data as $softwareBehavior)
	 	{
            \DB::table('software_behaviors')->insert($softwareBehavior);
	 	}
    }
}
