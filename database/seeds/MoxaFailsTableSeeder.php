<?php

use Illuminate\Database\Seeder;

class MoxaFailsTableSeeder extends Seeder
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
            'name' => 'error de configuracion puerto para gps',
            'description' => 'modificacion de moxa respecto a los puertos a configurar',
            'topic' => 'MOXA_CHANGE_PORT',
            'created_at' => $date,
            'updated_at' => $date
            ),
 			array(
            'name' => 'error de configuracion puerto para anemometro',
            'description' => 'modificacion de moxa respecto a los puertos a configurar',
            'topic' => 'MOXA_CHANGE_PORT',
            'created_at' => $date,
            'updated_at' => $date
            ),
 			array(
            'name' => 'error de configuracion script para ais',
            'description' => 'modificacion de moxa respecto a los puertos a configurar',
            'topic' => 'MOXA_CHANGE_PORT',
            'created_at' => $date,
            'updated_at' => $date
            ),
 			array(
            'name' => 'error de configuracion script para ecosonda',
            'description' => 'modificacion de moxa respecto a los puertos a configurar',
            'topic' => 'MOXA_CHANGE_PORT',
            'created_at' => $date,
            'updated_at' => $date
            ),
 			array(
            'name' => 'error de configuracion script para gyro',
            'description' => 'modificacion de moxa respecto a los puertos a configurar',
            'topic' => 'MOXA_CHANGE_PORT',
            'created_at' => $date,
            'updated_at' => $date
            ),
			array(
            'name' => 'error de configuracion script para radar',
            'description' => 'modificacion de moxa respecto a los puertos a configurar',
            'topic' => 'MOXA_CHANGE_PORT',
            'created_at' => $date,
            'updated_at' => $date
            )
        );
		foreach($data as $moxaFail)
	 	{
            \DB::table('moxa_fails')->insert($moxaFail);
	 	}

    }
}
