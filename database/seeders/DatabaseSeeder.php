<?php

namespace Database\Seeders;

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
        $this->call(PermissionTableSeeder::class);
    	$this->call(CreateAdminUserSeeder::class);
	    $this->call(EgyptSeeder::class);
        $this->call(SaudiArabiaSeeder::class);
        $this->call(UAESeeder::class);
        $this->call(IndustriesAndMajorsSeeder::class);
        $this->call(LaConfigSeeder::class);
    }
}
