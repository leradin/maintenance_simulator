<?php

use Illuminate\Database\Seeder;

class SolutionTableSeeder extends Seeder
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
            'name' => 'conectividad  a red',
            'description' => '1. El cursante abre una terminal dando ping a la dirección nucleo del sedam en caso de no tener conectividad, el cursante tendra que abrir una terminal y corroborar que la dirección IP tiene el formato correcto. De no ser asi dirigirse a  barra de menu lateral Izquierda posicionandose en el icono de red y dar click derecho, ir a editar conexiones, seleccion de tarjeta de red activa  para editar la configuracion de  iPv4.',
            'created_at' => $date,
            'updated_at' => $date
            ),
		array(
            'name' => 'conectividad de moxa',
            'description' => '2.El curaste abrira un navegador web, introducirá la dirección IP asisgnada al servidor de 8 puertos Nport5056, de no ser asi verificar la conectividad del cable de red del servidor y la dirección IP fija asignada como se indica en el Manual de Usuario ',
            'created_at' => $date,
            'updated_at' => $date
            ),
		array(
            'name' => 'acceso a moxa',
            'description' => '3.El curaste abrira un navegador web, introducirá la dirección IP asisgnada al servidor de 8 puertos Nport5056, accedera al menu de operación de la configuración teniendo como puerto asignado 4001.',
            'created_at' => $date,
            'updated_at' => $date
            ),
		array(
            'name' => 'configuracion de archivo ',
            'description' => '4..el cursante tendra que buscar el archivo SEDAM.xml en la siguiente ubicación /home/sedam/SEDAM/SEDAM.xml modificando el parametro "Conexión port= 9989 " en  la siguiente linea <Conexion port="9989" ip="172.16.194.56" name="GPS"/>sustituyendo  por "Conexión port= 4001 "',
            'created_at' => $date,
            'updated_at' => $date
            )
        );
        $activities = \DB::table('activities')->get()->toArray();

        foreach($data as $i => $solution)
	 	{
            $newSolution = \App\Solution::create($solution);
            $newSolution->activities()->attach($activities[$i]->id);

	 	}
    }
}
