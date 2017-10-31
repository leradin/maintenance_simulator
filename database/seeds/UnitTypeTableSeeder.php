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
            'created_at' => $date,
            'updated_at' => $date
	    	),
	    	array(
	        'name' => 'Patrulla Oceanica',
            'abbreviation' => 'PO',
            'created_at' => $date,
            'updated_at' => $date
	    	),
	    	array(
	        'name' => 'Patrulla Costera',
            'abbreviation' => 'PC',
            'created_at' => $date,
            'updated_at' => $date
	    	),
	    	array(
	        'name' => 'Patrulla Embarcada',
            'abbreviation' => 'PE',
            'created_at' => $date,
            'updated_at' => $date
	    	),
	    	array(
	        'name' => 'Mando',
            'abbreviation' => 'MA',
            'created_at' => $date,
            'updated_at' => $date
	    	),
	    	array(
	        'name' => 'Infanteria de Marina',
            'abbreviation' => 'IM',
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
