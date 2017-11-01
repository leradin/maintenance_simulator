<?php

use Illuminate\Database\Seeder;

class StudentTableSeeder extends Seeder
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
	        'enrollment' => 'A-12345678',
            'names' => 'Lenin Vladimir',
            'lastnames' => 'Ramirez Diaz',
            'degree_id' => 1,
            'ascription_id' => 1,
            'created_at' => $date,
            'updated_at' => $date
	    	),
	    	array(
	        'enrollment' => 'A-87654321',
            'names' => 'Juan Francisco',
            'lastnames' => 'Robles Camacho',
            'degree_id' => 1,
            'ascription_id' => 1,
            'created_at' => $date,
            'updated_at' => $date
	    	),
	    	array(
	        'enrollment' => 'A-87652321',
            'names' => 'Israel',
            'lastnames' => 'Rodriguez Paredez',
            'degree_id' => 1,
            'ascription_id' => 1,
            'created_at' => $date,
            'updated_at' => $date
	    	),
	    	array(
	        'enrollment' => 'A-87354321',
            'names' => 'Carlos',
            'lastnames' => 'Barron Garcia',
            'degree_id' => 1,
            'ascription_id' => 1,
            'created_at' => $date,
            'updated_at' => $date
	    	),
    	);

    	foreach($data as $student)
	 	{
            \DB::table('students')->insert($student);
	 	}
    }
}
