<?php

use Illuminate\Database\Seeder;

class KnowledgeTableSeeder extends Seeder
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
            'name' => 'el cursante habra de concluir el curso de configuracion del sistema de enlace de datos de la armada de mexico que se imparte en el laboratorio del simulador de mantenimiento',
            'description' => '',
            'created_at' => $date,
            'updated_at' => $date
            ),
			array(
            'name' => 'el cursante debera de tener conocimientos basicos en el uso del sistema operativo centos 6.8',
            'description' => '',
            'created_at' => $date,
            'updated_at' => $date
            ),
			array(
            'name' => 'el cursante debera de tener conocimientos basicos en uso de archivos xml',
            'description' => '',
            'created_at' => $date,
            'updated_at' => $date
            )
        );
        foreach($data as $knowledge)
	 	{
            \DB::table('knowledge')->insert($knowledge);
	 	}

    }
}
