<?php

use Illuminate\Database\Seeder;

class PracticeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon\Carbon::now();
        $units = \DB::table('unit_types')->get()->toArray();
        $materials = array(
            array(3,4)
        );
        $knowledges = array(
            array(1,2,3),
            array(2,3),
            array(2,3),
            array(2,3),
            array(2,3),
            array(2,3),
            array(2,3),
            array(1,2,3),
            array(1,2,3),
            array(2,3),
            array(2,3),
            array(2,3),
            array(2,3),
            array(2,3)
        );
        $objectives = array(
            array(1,2,3),
            array(2,5),
            array(2,6),
            array(2,7),
            array(2,8),
            array(2,4),
            array(2,9),
            array(1,2,3),
            array(1,2,3),
            array(2,5),
            array(2,6),
            array(2,7),
            array(2,8),
            array(2,4)
        );
        $softwareBehaviors = array(
            array(1),
            array(3),
            array(4),
            array(5),
            array(6),
            array(2),
            array(7),
            array(8),
            array(1),
            array(3),
            array(4),
            array(5),
            array(6),
            array(2)
        );
        $activities = array(
            array(1,4,5),
            array(1,4,5),
            array(1,4,5),
            array(1,4,5),
            array(1,4,5),
            array(1,4,5),
            array(1,2,6),
            array(1,2,7),
            array(1,2,8),
            array(1,2,8),
            array(1,2,8),
            array(1,2,8),
            array(1,2,8),
            array(1,2,8)
        );
        $tools = array(
            array(1,4,5),
            array(1,4,5),
            array(1,4,5),
            array(1,4,5),
            array(1,4,5),
            array(1,4,5),
            array(1,2,6),
            array(1,2,7),
            array(1,2,8),
            array(1,2,8),
            array(1,2,8),
            array(1,2,8),
            array(1,2,8),
            array(1,2,8)
        );
        $instruments = array(
            array(1),
            array(1),
            array(1),
            array(1),
            array(1),
            array(1),
            array(1),
            array(1),
            array(1),
            array(1),
            array(1),
            array(1),
            array(1),
            array(1)
        );
        $sensors = array(
            array(1,1),
            array(2,2),
            array(2,3),
            array(2,4),
            array(2,5),
            array(2,6),
            array(2,1),
            array(1,2),
            array(1,3),
            array(2,4),
            array(2,5),
            array(2,6),
            array(2,1),
            array(2,2)
        );
        $sedamFails = array(
            array(1),
            array(2),
            array(3),
            array(4),
            array(5),
            array(6),
            array(1),
            array(2),
            array(3),
            array(4),
            array(5),
            array(6),
            array(1),
            array(2)
        );
         $moxaFails = array(
            array(1),
            array(2),
            array(3),
            array(4),
            array(5),
            array(6),
            array(1),
            array(2),
            array(3),
            array(4),
            array(5),
            array(6),
            array(1),
            array(2)
        );
    	$data = array(
    		array(
	        'name' => 'Ejemplo_Error NMEA_FILTER GPS por configuracion de recepcion de tramas de GPS',
            'duration' => '02:00:00',
            'error_type_id' => 1,
            'unit_type_id' => rand(1,count($units)),
            'created_at' => $date,
            'updated_at' => $date
	    	),
	    	array(
	        'name' => 'Ejemplo_Error NMEA_FILTER AIS por configuracion de recepcion de tramas de GPS',
            'duration' => '01:00:00',
            'error_type_id' => 1,
            'unit_type_id' => rand(1,count($units)),
            'created_at' => $date,
            'updated_at' => $date
	    	),
	    	array(
	        'name' => 'Ejemplo_Error sensor manager GYRO por configuracion de puertos',
            'duration' => '03:00:00',
            'error_type_id' => 1,
            'unit_type_id' => rand(1,count($units)),
            'created_at' => $date,
            'updated_at' => $date
	    	),
	    	array(
	        'name' => 'Ejemplo_Error sensor manager RADAR por configuracion de puertos',
            'duration' => '01:00:00',
            'error_type_id' => 1,
            'unit_type_id' => rand(1,count($units)),
            'created_at' => $date,
            'updated_at' => $date
	    	),
	    	array(
	        'name' => 'Ejemplo_Error sensor manager ECOSONDA por configuracion de puertos',
            'duration' => '03:00:00',
            'error_type_id' => 1,
            'unit_type_id' => rand(1,count($units)),
            'created_at' => $date,
            'updated_at' => $date
	    	),
	    	array(
	        'name' => 'Ejemplo_Error sensor manager ANEMOMETRO por configuracion de puertos',
            'duration' => '03:00:00',
            'error_type_id' => 1,
            'unit_type_id' => rand(1,count($units)),
            'created_at' => $date,
            'updated_at' => $date
	    	),
	    	array(
	        'name' => 'Ejemplo_Error archivo de configuración sensor_simulation',
            'duration' => '03:00:00',
            'error_type_id' => 1,
            'unit_type_id' => rand(1,count($units)),
            'created_at' => $date,
            'updated_at' => $date
	    	),
	    	array(
	        'name' => 'Ejemplo_Error sensor manager por configuracion de Dirección IP  EN TODOS LOS SENSORES',
            'duration' => '01:00:00',
            'error_type_id' => 1,
            'unit_type_id' => rand(1,count($units)),
            'created_at' => $date,
            'updated_at' => $date
	    	),
	    	array(
	        'name' => 'Ejemplo_Error sensor manager GPS por configuracion de puertos',
            'duration' => '01:00:00',
            'error_type_id' => 1,
            'unit_type_id' => rand(1,count($units)),
            'created_at' => $date,
            'updated_at' => $date
	    	),
	    	array(
	        'name' => 'Ejemplo_Error sensor manager AIS por configuracion de puertos',
            'duration' => '03:00:00',
            'error_type_id' => 1,
            'unit_type_id' => rand(1,count($units)),
            'created_at' => $date,
            'updated_at' => $date
	    	),
	    	array(
	        'name' => 'Ejemplo_Error sensor manager GYRO por configuracion de puertos',
            'duration' => '04:00:00',
            'error_type_id' => 1,
            'unit_type_id' => rand(1,count($units)),
            'created_at' => $date,
            'updated_at' => $date
	    	),
	    	array(
	        'name' => 'Ejemplo_Error sensor manager RADAR por configuracion de puertos',
            'duration' => '01:00:00',
            'error_type_id' => 1,
            'unit_type_id' => rand(1,count($units)),
            'created_at' => $date,
            'updated_at' => $date
	    	),
	    	array(
	        'name' => 'Ejemplo_Error sensor manager ECOSONDA por configuracion de puertos',
            'duration' => '01:00:00',
            'error_type_id' => 1,
            'unit_type_id' => rand(1,count($units)),
            'created_at' => $date,
            'updated_at' => $date
	    	),
	    	array(
	        'name' => 'Ejemplo_Error sensor manager ANEMOMETRO por configuracion de puertos',
            'duration' => '02:00:00',
            'error_type_id' => 1,
            'unit_type_id' => rand(1,count($units)),
            'created_at' => $date,
            'updated_at' => $date
	    	)
    	);
        foreach($data as $index => $practice){
            $newPractice = \App\Practice::create($practice);
                $newPractice->materials()->attach($materials[0]);
                $newPractice->knowledge()->attach($knowledges[$index]);
                $newPractice->objectives()->attach($objectives[$index]);
                $newPractice->softwareBehaviors()->attach($softwareBehaviors[$index]);
                $newPractice->activities()->attach($activities[$index]);
                $newPractice->tools()->attach($tools[$index]);
                $newPractice->instruments()->attach($instruments[$index]);
                $newPractice->sensors()->attach($sensors[$index],['status' => $index+1]);
                $newPractice->sedamFails()->attach($sedamFails[$index]);
                $newPractice->moxaFails()->attach($moxaFails[$index]);
        }
    }
}
