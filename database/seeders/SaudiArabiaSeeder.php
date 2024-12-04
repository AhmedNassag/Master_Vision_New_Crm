<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SaudiArabiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert Saudi Arabia
        $country_id = DB::table('countries')->insertGetId([
            'name' => 'المملكة العربية السعودية',
            'phonecode' => 966,
        ]);

        // Insert Cities
        $cities = [
            ['name' => 'الرياض', 'country_id' => $country_id],
            ['name' => 'جدة', 'country_id' => $country_id],
            ['name' => 'مكة المكرمة', 'country_id' => $country_id],
            ['name' => 'المدينة المنورة', 'country_id' => $country_id],
            ['name' => 'الدمام', 'country_id' => $country_id],
            ['name' => 'الأحساء', 'country_id' => $country_id],
            ['name' => 'القطيف', 'country_id' => $country_id],
            ['name' => 'خميس مشيط', 'country_id' => $country_id],
            ['name' => 'حائل', 'country_id' => $country_id],
            ['name' => 'الطائف', 'country_id' => $country_id],
            ['name' => 'تبوك', 'country_id' => $country_id],
            ['name' => 'الخبر', 'country_id' => $country_id],
            ['name' => 'أبها', 'country_id' => $country_id],
            ['name' => 'نجران', 'country_id' => $country_id],
            ['name' => 'ينبع', 'country_id' => $country_id],
            ['name' => 'بريدة', 'country_id' => $country_id],
            ['name' => 'القصيم', 'country_id' => $country_id],
            ['name' => 'الجبيل', 'country_id' => $country_id],
            ['name' => 'حفر الباطن', 'country_id' => $country_id],
            ['name' => 'الخرج', 'country_id' => $country_id],
            ['name' => 'عرعر', 'country_id' => $country_id],
            ['name' => 'النماص', 'country_id' => $country_id],
            ['name' => 'جيزان', 'country_id' => $country_id],
            ['name' => 'الباحة', 'country_id' => $country_id],
            ['name' => 'الظهران', 'country_id' => $country_id],
            // Add more cities as needed
        ];

        DB::table('cities')->insert($cities);

        // Fetch inserted city IDs
        $riyadh_id = DB::table('cities')->where('name', 'الرياض')->first()->id;
        $jeddah_id = DB::table('cities')->where('name', 'جدة')->first()->id;
        $makkah_id = DB::table('cities')->where('name', 'مكة المكرمة')->first()->id;
        $madinah_id = DB::table('cities')->where('name', 'المدينة المنورة')->first()->id;
        $dammam_id = DB::table('cities')->where('name', 'الدمام')->first()->id;
        $al_ahsa_id = DB::table('cities')->where('name', 'الأحساء')->first()->id;
        $qatif_id = DB::table('cities')->where('name', 'القطيف')->first()->id;
        $khamis_mushait_id = DB::table('cities')->where('name', 'خميس مشيط')->first()->id;
        $hail_id = DB::table('cities')->where('name', 'حائل')->first()->id;
        $taif_id = DB::table('cities')->where('name', 'الطائف')->first()->id;
        // Add more city IDs as needed

        // Insert Areas
        $areas = [
            // Riyadh Areas
            ['name' => 'الربوة', 'city_id' => $riyadh_id],
            ['name' => 'الملز', 'city_id' => $riyadh_id],
            ['name' => 'العليا', 'city_id' => $riyadh_id],
            ['name' => 'النسيم', 'city_id' => $riyadh_id],
            ['name' => 'العزيزية', 'city_id' => $riyadh_id],
            ['name' => 'السليمانية', 'city_id' => $riyadh_id],
            ['name' => 'الشفا', 'city_id' => $riyadh_id],
            ['name' => 'الشميسي', 'city_id' => $riyadh_id],
            ['name' => 'الوزارات', 'city_id' => $riyadh_id],
            // Jeddah Areas
            ['name' => 'البلد', 'city_id' => $jeddah_id],
            ['name' => 'الروضة', 'city_id' => $jeddah_id],
            ['name' => 'الفيصلية', 'city_id' => $jeddah_id],
            ['name' => 'الحمراء', 'city_id' => $jeddah_id],
            ['name' => 'السلامة', 'city_id' => $jeddah_id],
            ['name' => 'النهضة', 'city_id' => $jeddah_id],
            ['name' => 'الشاطئ', 'city_id' => $jeddah_id],
            ['name' => 'الحرة', 'city_id' => $jeddah_id],
            ['name' => 'الكندرة', 'city_id' => $jeddah_id],
            // Makkah Areas
            ['name' => 'العزيزية', 'city_id' => $makkah_id],
            ['name' => 'الشرائع', 'city_id' => $makkah_id],
            ['name' => 'الخالدية', 'city_id' => $makkah_id],
            ['name' => 'المنسك', 'city_id' => $makkah_id],
            ['name' => 'النزلة', 'city_id' => $makkah_id],
            ['name' => 'الفيحاء', 'city_id' => $makkah_id],
            ['name' => 'الحرة', 'city_id' => $makkah_id],
            ['name' => 'الحمراء', 'city_id' => $makkah_id],
            // Add more areas as needed
        ];

        DB::table('areas')->insert($areas);
    }
}
