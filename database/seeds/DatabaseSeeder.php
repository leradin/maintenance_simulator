<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(ErrorTypeTableSeeder::class);
        $this->call(UnitTypeTableSeeder::class);
        $this->call(SensorTableSeeder::class);
        $this->call(ToolTableSeeder::class);
        $this->call(MaterialTableSeeder::class);
        $this->call(InstrumentTableSeeder::class);
    }
}
