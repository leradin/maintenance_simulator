<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
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
            'password' => bcrypt('123456'),
            'names' => 'Lenin Vladimir',
            'lastnames' => 'Ramirez Diaz',
            'degree_id' => 1,
            'ascription_id' => 1,
            'user' => true,
            'session_id' => '0',
            'created_at' => $date,
            'updated_at' => $date
            ),
            array(
            'enrollment' => 'A-87654321',
            'password' => bcrypt('123456'),
            'names' => 'Juan Francisco',
            'lastnames' => 'Robles Camacho',
            'degree_id' => 1,
            'ascription_id' => 1,
            'user' => true,
            'session_id' => '0',
            'created_at' => $date,
            'updated_at' => $date
            ),
            array(
            'enrollment' => 'A-87652321',
            'password' => bcrypt('123456'),
            'names' => 'Israel',
            'lastnames' => 'Rodriguez Paredez',
            'degree_id' => 1,
            'ascription_id' => 1,
            'user' => true,
            'session_id' => '0',
            'created_at' => $date,
            'updated_at' => $date
            ),
            array(
            'enrollment' => 'A-87354321',
            'password' => bcrypt('123456'),
            'names' => 'Carlos',
            'lastnames' => 'Barron Garcia',
            'degree_id' => 1,
            'ascription_id' => 1,
            'user' => false,
            'session_id' => '0',
            'created_at' => $date,
            'updated_at' => $date
            ),
            array(
            'enrollment' => 'A-87354999',
            'password' => bcrypt('123456'),
            'names' => 'Enrique',
            'lastnames' => 'Carvajal Lopéz',
            'degree_id' => 1,
            'ascription_id' => 1,
            'user' => false,
            'session_id' => '0',
            'created_at' => $date,
            'updated_at' => $date
            ),
            array(
            'enrollment' => 'A-111111111',
            'password' => bcrypt('123456'),
            'names' => 'Eduardo',
            'lastnames' => 'Mora Palacios',
            'degree_id' => 1,
            'ascription_id' => 1,
            'user' => false,
            'session_id' => '0',
            'created_at' => $date,
            'updated_at' => $date
            ),
            array(
            'enrollment' => 'A-222222222',
            'password' => bcrypt('123456'),
            'names' => 'Jesus',
            'lastnames' => 'Sosa Medina',
            'degree_id' => 1,
            'ascription_id' => 1,
            'user' => false,
            'session_id' => '0',
            'created_at' => $date,
            'updated_at' => $date
            )
        );

        foreach($data as $user)
        {
            \DB::table('users')->insert($user);
        }
    }
}
