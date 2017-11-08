<?php

use Illuminate\Database\Seeder;

class ActivitieTableSeeder extends Seeder
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
            'name' => 'conexion al sistema',
            'description' => 'verificar conectividad del sistema',
            'created_at' => $date,
            'updated_at' => $date
            ),
			array(
            'name' => 'conexion a moxa',
            'description' => 'verificar conectividad del sistema con el servidor de 8 puertos Nport-5056 ',
            'created_at' => $date,
            'updated_at' => $date
            ),
			array(
            'name' => 'configuracion de puertos ',
            'description' => 'verificar la configuracion de puertos de lectura de los sensores respecto al manual de usuario',
            'created_at' => $date,
            'updated_at' => $date
            )

        );
        foreach($data as $activitie)
	 	{
            \DB::table('activities')->insert($activitie);
	 	}

    }
}
