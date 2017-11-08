<?php

use Illuminate\Database\Seeder;

class SedamFailsTableSeeder extends Seeder
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
            'name' => 'error de configuracion script para gps',
            'description' => 'modificacion de archivo xml respecto a los puertos a configurar',
            'script' => 'EDIT_CONFIG_FILES',
            'created_at' => $date,
            'updated_at' => $date
            ),
 			array(
            'name' => 'error de configuracion script para anemometro',
            'description' => 'modificacion de archivo xml respecto a los puertos a configurar',
            'script' => 'EDIT_CONFIG_FILES',
            'created_at' => $date,
            'updated_at' => $date
            ),
 			array(
            'name' => 'error de configuracion script para ais',
            'description' => 'modificacion de archivo xml respecto a los puertos a configurar',
            'script' => 'EDIT_CONFIG_FILES',
            'created_at' => $date,
            'updated_at' => $date
            ),
 		    array(
            'name' => 'error de configuracion script para ecosonda',
            'description' => 'modificacion de archivo xml respecto a los puertos a configurar',
            'script' => 'EDIT_CONFIG_FILES',
            'created_at' => $date,
            'updated_at' => $date
            ),
 			array(
            'name' => 'error de configuracion script para gyro',
            'description' => 'modificacion de archivo xml respecto a los puertos a configurar',
            'script' => 'EDIT_CONFIG_FILES',
            'created_at' => $date,
            'updated_at' => $date
            ),
			array(
            'name' => 'error de configuracion script para radar',
            'description' => 'modificacion de archivo xml respecto a los puertos a configurar',
            'script' => 'EDIT_CONFIG_FILES',
            'created_at' => $date,
            'updated_at' => $date
            )
        );

		foreach($data as $sedamFail)
	 	{
            \DB::table('sedam_fails')->insert($sedamFail);
	 	}

    }
}
