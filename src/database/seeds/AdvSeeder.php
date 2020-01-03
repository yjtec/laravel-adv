<?php

use Illuminate\Database\Seeder;

class AdvSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdvTypeSeeder::class);
        $this->call(AdvPlatformSeeder::class);
    }
}
