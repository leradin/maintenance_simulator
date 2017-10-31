<?php

use Illuminate\Database\Seeder;

class ErrorTypeTableSeeder extends Seeder
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
	        'name' => 'Software',
            'abbreviation' => 'SW',
            'created_at' => $date,
            'updated_at' => $date
	    	),
	    	array(
	        'name' => 'Hardware',
            'abbreviation' => 'HW',
            'created_at' => $date,
            'updated_at' => $date
	    	)
    	);

    	foreach($data as $erroType)
	 	{
            \DB::table('error_types')->insert($erroType);
	 	}
    }
}
