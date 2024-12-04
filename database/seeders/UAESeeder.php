<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UAESeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert United Arab Emirates
        $country_id = DB::table('countries')->insertGetId([
            'name' => 'الإمارات العربية المتحدة',
            'phonecode' => 971,
        ]);

        // Insert Cities
        $cities = [
            ['name' => 'أبوظبي', 'country_id' => $country_id],
            ['name' => 'دبي', 'country_id' => $country_id],
            ['name' => 'الشارقة', 'country_id' => $country_id],
            ['name' => 'عجمان', 'country_id' => $country_id],
            ['name' => 'رأس الخيمة', 'country_id' => $country_id],
            ['name' => 'الفجيرة', 'country_id' => $country_id],
            ['name' => 'أم القيوين', 'country_id' => $country_id],
        ];

        DB::table('cities')->insert($cities);

        // Fetch inserted city IDs
        $abu_dhabi_id = DB::table('cities')->where('name', 'أبوظبي')->first()->id;
        $dubai_id = DB::table('cities')->where('name', 'دبي')->first()->id;
        $sharjah_id = DB::table('cities')->where('name', 'الشارقة')->first()->id;
        $ajman_id = DB::table('cities')->where('name', 'عجمان')->first()->id;
        $ras_al_khaimah_id = DB::table('cities')->where('name', 'رأس الخيمة')->first()->id;
        $fujairah_id = DB::table('cities')->where('name', 'الفجيرة')->first()->id;
        $um_al_quwain_id = DB::table('cities')->where('name', 'أم القيوين')->first()->id;

        // Insert Areas
        $areas = [
            // Abu Dhabi Areas
            ['name' => 'المرور', 'city_id' => $abu_dhabi_id],
            ['name' => 'المركز', 'city_id' => $abu_dhabi_id],
            ['name' => 'النادي السياحي', 'city_id' => $abu_dhabi_id],
            ['name' => 'البطين', 'city_id' => $abu_dhabi_id],
            ['name' => 'المرس', 'city_id' => $abu_dhabi_id],
            ['name' => 'الظفرة', 'city_id' => $abu_dhabi_id],
            ['name' => 'الخالدية', 'city_id' => $abu_dhabi_id],
            ['name' => 'الرمة', 'city_id' => $abu_dhabi_id],
            ['name' => 'الزاهية', 'city_id' => $abu_dhabi_id],
            // Dubai Areas
            ['name' => 'بر دبي', 'city_id' => $dubai_id],
            ['name' => 'دبي مارينا', 'city_id' => $dubai_id],
            ['name' => 'البرشاء', 'city_id' => $dubai_id],
            ['name' => 'القوز', 'city_id' => $dubai_id],
            ['name' => 'الجميرا', 'city_id' => $dubai_id],
            ['name' => 'الساتوا', 'city_id' => $dubai_id],
            ['name' => 'الخليج التجاري', 'city_id' => $dubai_id],
            // Sharjah Areas
            ['name' => 'الشارقة القديمة', 'city_id' => $sharjah_id],
            ['name' => 'النهدة', 'city_id' => $sharjah_id],
            ['name' => 'النهدة', 'city_id' => $sharjah_id],
            ['name' => 'الحلية', 'city_id' => $sharjah_id],
            ['name' => 'الرحمانية', 'city_id' => $sharjah_id],
            // Ajman Areas
            ['name' => 'النعيمية', 'city_id' => $ajman_id],
            ['name' => 'الراشدية', 'city_id' => $ajman_id],
            ['name' => 'الجرف', 'city_id' => $ajman_id],
            ['name' => 'الحميدية', 'city_id' => $ajman_id],
            // Ras Al Khaimah Areas
            ['name' => 'النخيل', 'city_id' => $ras_al_khaimah_id],
            ['name' => 'المعامير', 'city_id' => $ras_al_khaimah_id],
            ['name' => 'المعيريج', 'city_id' => $ras_al_khaimah_id],
            ['name' => 'خزان', 'city_id' => $ras_al_khaimah_id],
            // Fujairah Areas
            ['name' => 'الفجيرة', 'city_id' => $fujairah_id],
            ['name' => 'دبا الفجيرة', 'city_id' => $fujairah_id],
            ['name' => 'مسافي', 'city_id' => $fujairah_id],
            // Umm Al Quwain Areas
            ['name' => 'أم القيوين', 'city_id' => $um_al_quwain_id],
            ['name' => 'الرميثية', 'city_id' => $um_al_quwain_id],
            ['name' => 'الراشدية', 'city_id' => $um_al_quwain_id],
        ];

        DB::table('areas')->insert($areas);
    }
}
