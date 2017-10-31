<?php

use Illuminate\Database\Seeder;

class InstrumentTableSeeder extends Seeder
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
	        'name' => 'Multimetro',
            'description' => 'Multimetro de gancho 600 A CA',
            'created_at' => $date,
            'updated_at' => $date
	    	)
    	);

    	foreach($data as $instrument)
	 	{
            \DB::table('instruments')->insert($instrument);
	 	}
    }
}
