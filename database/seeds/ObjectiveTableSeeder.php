<?php

use Illuminate\Database\Seeder;

class ObjectiveTableSeeder extends Seeder
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
            'name' => 'identificacion y solucion de tipo de error',
            'description' => 'el cursante sera capaz de identifcar el tipo de error que se le presento y su debida solucion',
            'created_at' => $date,
            'updated_at' => $date
            ),
			array(
            'name' => 'diagnostico de error',
            'description' => 'el cursante sera capaz de diagnosticar el error generado por el administrador',
            'created_at' => $date,
            'updated_at' => $date
            ),
			array(
            'name' => 'funcionamiento',
            'description' => 'el cursante sera capaz de poner en funcionamiento del sistema sedam debido a la presencia de errores en la visualizacion del gps ',
            'created_at' => $date,
            'updated_at' => $date
            ),
            array(
            'name' => 'funcionamiento',
            'description' => 'el cursante sera capaz de poner en funcionamiento del sistema sedam debido a la presencia de errores en la visualizacion del ANEMOMETRO ',
            'created_at' => $date,
            'updated_at' => $date
            ),
             array(
            'name' => 'funcionamiento',
            'description' => 'el cursante sera capaz de poner en funcionamiento del sistema sedam debido a la presencia de errores en la visualizacion del AIS ',
            'created_at' => $date,
            'updated_at' => $date
            ),
            array(
            'name' => 'funcionamiento',
            'description' => 'el cursante sera capaz de poner en funcionamiento del sistema sedam debido a la presencia de errores en la visualizacion del GYRO',
            'created_at' => $date,
            'updated_at' => $date
            ),
            array(
            'name' => 'funcionamiento',
            'description' => 'el cursante sera capaz de poner en funcionamiento del sistema sedam debido a la presencia de errores en la visualizacion del RADAR ',
            'created_at' => $date,
            'updated_at' => $date
            ),
            array(
            'name' => 'funcionamiento',
            'description' => 'el cursante sera capaz de poner en funcionamiento del sistema sedam debido a la presencia de errores en la visualizacion del ECOSONDA ',
            'created_at' => $date,
            'updated_at' => $date
            )
        );
        foreach($data as $objective)
	 	{
            \DB::table('objectives')->insert($objective);
	 	}

    }
}
