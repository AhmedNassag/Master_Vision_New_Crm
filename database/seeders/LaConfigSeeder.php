<?php

namespace Database\Seeders;

use App\Models\LAConfigs;
use Illuminate\Database\Seeder;

class LaConfigSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        $la_config_1 = LAConfigs::create([
            'key'     => 'end_date',
            'section' => 'end_date',
            'value'   => null,
        ]);

        $la_config_2 = LAConfigs::create([
            'key'     => 'whatsapp_token',
            'section' => 'whatsapp_token',
            'value'   => null,
        ]);

        $la_config_3 = LAConfigs::create([
            'key'     => 'whatsapp_instance',
            'section' => 'whatsapp_instance',
            'value'   => null,
        ]);
    }
}
