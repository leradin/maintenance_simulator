<?php

use Illuminate\Database\Seeder;

class DegreeTableSeeder extends Seeder
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
	        'name' => 'Capitan de Navío',
            'abbreviation' => 'Cap. Nav',
            'created_at' => $date,
            'updated_at' => $date
	    	),
	    	array(
	        'name' => 'Capitan de Fragata',
            'abbreviation' => 'Cap. Frag.',
            'created_at' => $date,
            'updated_at' => $date
	    	),
	    	array(
	        'name' => 'Capitan de Corbeta',
            'abbreviation' => 'Cap. Cor.',
            'created_at' => $date,
            'updated_at' => $date
	    	),
	    	array(
	        'name' => 'Teniente de Navío',
            'abbreviation' => 'Tet. Nav',
            'created_at' => $date,
            'updated_at' => $date
	    	),
	    	array(
	        'name' => 'Teniente de Fragata',
            'abbreviation' => 'Tet. Frag.',
            'created_at' => $date,
            'updated_at' => $date
	    	),
	    	array(
	        'name' => 'Teniente de Corbeta',
            'abbreviation' => 'Tet. Cor',
            'created_at' => $date,
            'updated_at' => $date
	    	)
    	);

    	foreach($data as $degree)
	 	{
            \DB::table('degrees')->insert($degree);
	 	}
    }
}
