<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(ACLSeeder::class);
        $this->call(VilleSeeder::class);
    }
}
