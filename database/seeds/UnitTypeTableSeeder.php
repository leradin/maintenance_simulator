<?php

use Illuminate\Database\Seeder;

class UnitTypeTableSeeder extends Seeder
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
	        'name' => 'Patrulla Interceptora',
            'abbreviation' => 'PI',
            'ip_address_id' => 1,
            'created_at' => $date,
            'updated_at' => $date
	    	),
	    	array(
	        'name' => 'Patrulla Oceanica',
            'abbreviation' => 'POP',
            'ip_address_id' => 2,
            'created_at' => $date,
            'updated_at' => $date
	    	),
            array(
            'name' => 'Infanteria de Marina',
            'abbreviation' => 'IM',
            'ip_address_id' => 3,
            'created_at' => $date,
            'updated_at' => $date
            ),
            array(
            'name' => 'Patrulla Embarcada',
            'abbreviation' => 'PE',
            'ip_address_id' => 4,
            'created_at' => $date,
            'updated_at' => $date
            ),
            array(
            'name' => 'Mando',
            'abbreviation' => 'MA',
            'ip_address_id' => 5,
            'created_at' => $date,
            'updated_at' => $date
            ),
	    	array(
	        'name' => 'Patrulla Costera',
            'abbreviation' => 'PC',
            'ip_address_id' => 6,
            'created_at' => $date,
            'updated_at' => $date
	    	)
    	);

    	foreach($data as $unitType)
	 	{
            \DB::table('unit_types')->insert($unitType);
	 	}
    }
}
