<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(EvaluationCriteriaSeeder::class);
        $this->call(NetworkNodeSeeder::class);
        $this->call(QualityEvaluationSeeder::class);
        $this->call(UserSeeder::class);
    }
}
