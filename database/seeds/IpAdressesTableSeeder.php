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
            'unit_type_id' => 1,
            'created_at' => $date,
            'updated_at' => $date
            ),
			array(
            'ip' => '192.168.1.5',
            'unit_type_id' => 2,
            'created_at' => $date,
            'updated_at' => $date
            ),
			array(
            'ip' => '192.168.1.14',
            'unit_type_id' => 3,
            'created_at' => $date,
            'updated_at' => $date
            ),
            array(
            'ip' => '192.168.1.8',
            'unit_type_id' => 4,
            'created_at' => $date,
            'updated_at' => $date
            ),
            array(
            'ip' => '192.168.1.11',
            'unit_type_id' => 5,
            'created_at' => $date,
            'updated_at' => $date
            ),
            array(
            'ip' => '192.168.1.11',
            'unit_type_id' => 5,
            'created_at' => $date,
            'updated_at' => $date
            ),
            array(
            'ip' => '192.168.1.21',
            'unit_type_id' => 6,
            'created_at' => $date,
            'updated_at' => $date
            )
        );
        foreach($data as $ipAddress){
            \DB::table('ip_addresses')->insert($ipAddress);
	 	}
    }
}
