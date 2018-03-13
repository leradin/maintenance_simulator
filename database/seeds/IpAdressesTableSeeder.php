<?php

use Illuminate\Database\Seeder;

class IpAdressesTableSeeder extends Seeder
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
            'ip' => '192.168.1.17',
            'created_at' => $date,
            'updated_at' => $date
            ),
			array(
            'ip' => '192.168.1.5',
            'created_at' => $date,
            'updated_at' => $date
            ),
			array(
            'ip' => '192.168.1.14',
            'created_at' => $date,
            'updated_at' => $date
            ),
            array(
            'ip' => '192.168.1.8',
            'created_at' => $date,
            'updated_at' => $date
            ),
            array(
            'ip' => '192.168.1.11',
            'created_at' => $date,
            'updated_at' => $date
            ),
            array(
            'ip' => '192.168.1.11',
            'created_at' => $date,
            'updated_at' => $date
            ),
            array(
            'ip' => '192.168.1.21',
            'created_at' => $date,
            'updated_at' => $date
            )
        );
        foreach($data as $ipAddress){
            \DB::table('ip_addresses')->insert($ipAddress);
	 	}
    }
}
