<?php

use Illuminate\Database\Seeder;

class AscriptionTableSeeder extends Seeder
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
	        'name' => 'INSTITUTO DE DESARROLLO',
            'abbreviation' => 'INIDETAM',
            'created_at' => $date,
            'updated_at' => $date
	    	),
	    	array(
	        'name' => 'SECRETARIA DE DESARROLLO',
            'abbreviation' => 'SUBDESITA',
            'created_at' => $date,
            'updated_at' => $date
	    	)
    	);

    	foreach($data as $ascription)
	 	{
            \DB::table('ascriptions')->insert($ascription);
	 	}
    }
}
