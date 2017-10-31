<?php

use Illuminate\Database\Seeder;

class ToolTableSeeder extends Seeder
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
	        'name' => 'Desarmadores',
            'description' => 'Juego de desarmadores de 65 pzas',
            'created_at' => $date,
            'updated_at' => $date
	    	),
	    	array(
	        'name' => 'Cinta de aislar',
            'description' => 'Cinta de aislar 3M',
            'created_at' => $date,
            'updated_at' => $date
	    	),
	    	array(
	        'name' => 'Aislante',
            'description' => 'AISLANTE TERMIFOT DE 1/2  REDUCCIÓN 2:1',
            'created_at' => $date,
            'updated_at' => $date
	    	),
	    	array(
	        'name' => 'Aislante',
            'description' => 'AISLANTE TERMIFOT DE 3/8  REDUCCIÓN 2:1',
            'created_at' => $date,
            'updated_at' => $date
	    	),
	    	array(
	        'name' => 'Pistola de calor',
            'description' => 'Pistola de calor',
            'created_at' => $date,
            'updated_at' => $date
	    	),
	    	array(
	        'name' => 'Sierra caladora',
            'description' => 'Sierra caladora',
            'created_at' => $date,
            'updated_at' => $date
	    	),
	    	array(
	        'name' => 'segueta con molde para cortes en angulo',
            'description' => 'Stanley Tagliacornici in ABS con Sega a Dorso',
            'created_at' => $date,
            'updated_at' => $date
	    	),
	    	array(
	        'name' => 'taladro rotomartillo ',
            'description' => 'Rotomartillo 800 W de 1/2',
            'created_at' => $date,
            'updated_at' => $date
	    	),
	    	array(
	        'name' => 'punto de golpe',
            'description' => 'Juego de 5 puntos para centrar',
            'created_at' => $date,
            'updated_at' => $date
	    	),
	    	array(
	        'name' => 'martillo',
            'description' => 'Martillo 16 oz',
            'created_at' => $date,
            'updated_at' => $date
	    	),
	    	array(
	        'name' => 'flexometro',
            'description' => 'Flexometro 3M',
            'created_at' => $date,
            'updated_at' => $date
	    	),
	    	array(
	        'name' => 'Herramienta mecanica',
            'description' => 'HERRAMIENTAS CRAFTSMAN CON 254 PZAS',
            'created_at' => $date,
            'updated_at' => $date
	    	),
	    	array(
	        'name' => 'Navaja',
            'description' => 'Navaja con alma metalica de 6',
            'created_at' => $date,
            'updated_at' => $date
	    	),
	    	array(
	        'name' => 'CARRIL',
            'description' => 'Din Rail G, TS32 Standard, 2m x 35mm x 15mm',
            'created_at' => $date,
            'updated_at' => $date
	    	)
    	);

    	foreach($data as $tool)
	 	{
            \DB::table('tools')->insert($tool);
	 	}
    }
}
