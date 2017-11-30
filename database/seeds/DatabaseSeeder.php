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
        $this->call(ErrorTypeTableSeeder::class);
        $this->call(UnitTypeTableSeeder::class);
        $this->call(SensorTableSeeder::class);
        $this->call(ToolTableSeeder::class);
        $this->call(MaterialTableSeeder::class);
        $this->call(InstrumentTableSeeder::class);
        $this->call(DegreeTableSeeder::class);
        $this->call(AscriptionTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(IpAdressesTableSeeder::class);
        //$this->call(StudentTableSeeder::class);
        $this->call(ActivitieTableSeeder::class);
        $this->call(AscriptionTableSeeder::class);
        $this->call(HardwareBehaviorTableSeeder::class);
        $this->call(KnowledgeTableSeeder::class);
        $this->call(MoxaFailsTableSeeder::class);
        $this->call(ObjectiveTableSeeder::class);
        $this->call(SedamFailsTableSeeder::class);
        $this->call(SoftwareBehaviorTableSeeder::class);
        $this->call(SolutionTableSeeder::class);
        $this->call(PracticeTableSeeder::class);
    }
}
