<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EgyptSeeder extends Seeder
{
    public function run()
    {
        // Insert Egypt
        $country_id = DB::table('countries')->insertGetId([
            'name' => 'مصر',
            'phonecode' => 20
        ]);

        // Insert Cities
        $cities = [
            ['name' => 'القاهرة', 'country_id' => $country_id],
            ['name' => 'الإسكندرية', 'country_id' => $country_id],
            ['name' => 'الجيزة', 'country_id' => $country_id],
            ['name' => 'السويس', 'country_id' => $country_id],
            ['name' => 'المنصورة', 'country_id' => $country_id],
            ['name' => 'طنطا', 'country_id' => $country_id],
            ['name' => 'الأقصر', 'country_id' => $country_id],
            ['name' => 'أسوان', 'country_id' => $country_id],
            ['name' => 'شرم الشيخ', 'country_id' => $country_id],
            ['name' => 'الغردقة', 'country_id' => $country_id],
    		['name' => 'بورسعيد', 'country_id' => $country_id],
            ['name' => 'دمياط', 'country_id' => $country_id],
            ['name' => 'الإسماعيلية', 'country_id' => $country_id],
            ['name' => 'العريش', 'country_id' => $country_id],
            ['name' => 'الفيوم', 'country_id' => $country_id],
            ['name' => 'بني سويف', 'country_id' => $country_id],
            ['name' => 'المنيا', 'country_id' => $country_id],
            ['name' => 'سوهاج', 'country_id' => $country_id],
            ['name' => 'قنا', 'country_id' => $country_id],
            ['name' => 'مرسى مطروح', 'country_id' => $country_id],
            ['name' => 'السويس', 'country_id' => $country_id],
            ['name' => 'دمنهور', 'country_id' => $country_id],
            ['name' => 'الزقازيق', 'country_id' => $country_id],
            ['name' => 'أسيوط', 'country_id' => $country_id],
            ['name' => 'كفر الشيخ', 'country_id' => $country_id],
            ['name' => 'المنوفية', 'country_id' => $country_id],
            ['name' => 'بنها', 'country_id' => $country_id],
            ['name' => 'السويس', 'country_id' => $country_id],
        ];

        DB::table('cities')->insert($cities);

        // Fetch inserted city IDs
        $cairo_id = DB::table('cities')->where('name', 'القاهرة')->first()->id;
        $alexandria_id = DB::table('cities')->where('name', 'الإسكندرية')->first()->id;
        $giza_id = DB::table('cities')->where('name', 'الجيزة')->first()->id;
		$suez_id = DB::table('cities')->where('name', 'السويس')->first()->id;
		$mansoura_id = DB::table('cities')->where('name', 'المنصورة')->first()->id;
		$tanta_id = DB::table('cities')->where('name', 'طنطا')->first()->id;
		$luxor_id = DB::table('cities')->where('name', 'الأقصر')->first()->id;
		$aswan_id = DB::table('cities')->where('name', 'أسوان')->first()->id;
		$sharm_id = DB::table('cities')->where('name', 'شرم الشيخ')->first()->id;
		$hurghada_id = DB::table('cities')->where('name', 'الغردقة')->first()->id;
		$portsaid_id = DB::table('cities')->where('name', 'بورسعيد')->first()->id;
		$damietta_id = DB::table('cities')->where('name', 'دمياط')->first()->id;
		$ismailia_id = DB::table('cities')->where('name', 'الإسماعيلية')->first()->id;
		$arish_id = DB::table('cities')->where('name', 'العريش')->first()->id;
		$fayoum_id = DB::table('cities')->where('name', 'الفيوم')->first()->id;
		$benisuef_id = DB::table('cities')->where('name', 'بني سويف')->first()->id;
		$minya_id = DB::table('cities')->where('name', 'المنيا')->first()->id;
		$sohag_id = DB::table('cities')->where('name', 'سوهاج')->first()->id;
		$qena_id = DB::table('cities')->where('name', 'قنا')->first()->id;
		$marsamatrouh_id = DB::table('cities')->where('name', 'مرسى مطروح')->first()->id;
		$dominor_id = DB::table('cities')->where('name', 'الزقازيق')->first()->id;
		$assuit_id = DB::table('cities')->where('name', 'أسيوط')->first()->id;
		$kafr_alsheikh_id = DB::table('cities')->where('name', 'كفر الشيخ')->first()->id;
		$monofya = DB::table('cities')->where('name', 'المنوفية')->first()->id;
		$banha_id = DB::table('cities')->where('name', 'بنها')->first()->id;
        // Insert Areas
        $areas = [
            // Cairo Areas
    ['name' => 'المعادي', 'city_id' => $cairo_id],
    ['name' => 'مصر الجديدة', 'city_id' => $cairo_id],
    ['name' => 'مدينة نصر', 'city_id' => $cairo_id],
    ['name' => 'الزمالك', 'city_id' => $cairo_id],
    ['name' => 'وسط البلد', 'city_id' => $cairo_id],
    ['name' => 'المقطم', 'city_id' => $cairo_id],
    ['name' => 'مدينة الرحاب', 'city_id' => $cairo_id],
    ['name' => 'التجمع الخامس', 'city_id' => $cairo_id],
    ['name' => 'عين شمس', 'city_id' => $cairo_id],
    ['name' => 'حلوان', 'city_id' => $cairo_id],
    ['name' => 'شبرا', 'city_id' => $cairo_id],
    ['name' => 'المرج', 'city_id' => $cairo_id],
    ['name' => 'مدينة بدر', 'city_id' => $cairo_id],
    ['name' => 'المعادى الجديدة', 'city_id' => $cairo_id],
    ['name' => 'النزهة', 'city_id' => $cairo_id],
    ['name' => 'حدائق القبة', 'city_id' => $cairo_id],
    ['name' => 'العباسية', 'city_id' => $cairo_id],
    ['name' => 'المنيل', 'city_id' => $cairo_id],
    ['name' => 'دار السلام', 'city_id' => $cairo_id],
    ['name' => 'الظاهر', 'city_id' => $cairo_id],
    ['name' => 'عزبة النخل', 'city_id' => $cairo_id],
    ['name' => 'السيدة زينب', 'city_id' => $cairo_id],
    ['name' => 'الدراسة', 'city_id' => $cairo_id],
    ['name' => 'باب الشعرية', 'city_id' => $cairo_id],
    ['name' => 'الزاوية الحمراء', 'city_id' => $cairo_id],
    ['name' => 'الشرابية', 'city_id' => $cairo_id],
    ['name' => 'القلعة', 'city_id' => $cairo_id],
    ['name' => 'المنيرة', 'city_id' => $cairo_id],
    ['name' => 'المرج الجديدة', 'city_id' => $cairo_id],
    ['name' => 'منشية ناصر', 'city_id' => $cairo_id],
    ['name' => 'حدائق حلوان', 'city_id' => $cairo_id],
    ['name' => 'الحلمية', 'city_id' => $cairo_id],
    ['name' => 'الفسطاط', 'city_id' => $cairo_id],
    ['name' => 'الوراق', 'city_id' => $cairo_id],
    ['name' => 'أرض اللواء', 'city_id' => $cairo_id],
    ['name' => 'المرج القديمة', 'city_id' => $cairo_id],
    ['name' => 'روض الفرج', 'city_id' => $cairo_id],
    ['name' => 'الكيت كات', 'city_id' => $cairo_id],
    ['name' => 'حى السفارات', 'city_id' => $cairo_id],
    ['name' => 'التجمع الأول', 'city_id' => $cairo_id],
    ['name' => 'الشيخ زايد', 'city_id' => $cairo_id],
    ['name' => 'الشروق', 'city_id' => $cairo_id],
    ['name' => 'القطامية', 'city_id' => $cairo_id],
    ['name' => 'المعراج', 'city_id' => $cairo_id],
    ['name' => 'عين شمس الغربية', 'city_id' => $cairo_id],
    ['name' => 'عرب غنيم', 'city_id' => $cairo_id],
    ['name' => 'حى الزيتون', 'city_id' => $cairo_id],
    ['name' => 'حى المعادى', 'city_id' => $cairo_id],
    ['name' => 'حى غرب القاهرة', 'city_id' => $cairo_id],
            // Alexandria Areas
    ['name' => 'سموحة', 'city_id' => $alexandria_id],
    ['name' => 'العصافرة', 'city_id' => $alexandria_id],
    ['name' => 'المنشية', 'city_id' => $alexandria_id],
    ['name' => 'محرم بك', 'city_id' => $alexandria_id],
    ['name' => 'سان ستيفانو', 'city_id' => $alexandria_id],
    ['name' => 'الجمرك', 'city_id' => $alexandria_id],
    ['name' => 'المنتزه', 'city_id' => $alexandria_id],
    ['name' => 'كامب شيزار', 'city_id' => $alexandria_id],
    ['name' => 'سموحة الجديدة', 'city_id' => $alexandria_id],
    ['name' => 'المعمورة', 'city_id' => $alexandria_id],
    ['name' => 'العامرية', 'city_id' => $alexandria_id],
    ['name' => 'الدخيلة', 'city_id' => $alexandria_id],
    ['name' => 'السيوف', 'city_id' => $alexandria_id],
    ['name' => 'باب شرق', 'city_id' => $alexandria_id],
    ['name' => 'الساحل', 'city_id' => $alexandria_id],
    ['name' => 'الشاطبى', 'city_id' => $alexandria_id],
    ['name' => 'كرموز', 'city_id' => $alexandria_id],
    ['name' => 'العامرية الجديدة', 'city_id' => $alexandria_id],
    ['name' => 'أبوقير', 'city_id' => $alexandria_id],
    ['name' => 'العوايد', 'city_id' => $alexandria_id],
    ['name' => 'محطة الرمل', 'city_id' => $alexandria_id],
    ['name' => 'الأنفوشى', 'city_id' => $alexandria_id],
    ['name' => 'علي بن أبي طالب', 'city_id' => $alexandria_id],
    ['name' => 'السان ستيفانو', 'city_id' => $alexandria_id],
    ['name' => 'حى المنتزه', 'city_id' => $alexandria_id],
    ['name' => 'المكس', 'city_id' => $alexandria_id],
            // Giza Areas
    ['name' => 'الدقي', 'city_id' => $giza_id],
    ['name' => 'الهرم', 'city_id' => $giza_id],
    ['name' => 'فيصل', 'city_id' => $giza_id],
    ['name' => 'المهندسين', 'city_id' => $giza_id],
    ['name' => '6 أكتوبر', 'city_id' => $giza_id],
    ['name' => 'الشيخ زايد', 'city_id' => $giza_id],
    ['name' => 'العجوزة', 'city_id' => $giza_id],
    ['name' => 'البدرشين', 'city_id' => $giza_id],
    ['name' => 'الحوامدية', 'city_id' => $giza_id],
    ['name' => 'كرداسة', 'city_id' => $giza_id],
    ['name' => 'أبو النمرس', 'city_id' => $giza_id],
    ['name' => 'أوسيم', 'city_id' => $giza_id],
    ['name' => 'الوراق', 'city_id' => $giza_id],
    ['name' => 'صفط اللبن', 'city_id' => $giza_id],
    ['name' => 'أبو رواش', 'city_id' => $giza_id],
    ['name' => 'المنيب', 'city_id' => $giza_id],
    ['name' => 'الجيزة الجديدة', 'city_id' => $giza_id],
    ['name' => 'منشأة القناطر', 'city_id' => $giza_id],
    ['name' => 'القرية الذكية', 'city_id' => $giza_id],
    ['name' => 'أرض اللواء', 'city_id' => $giza_id],
    ['name' => 'الكيت كات', 'city_id' => $giza_id],
    ['name' => 'البرك', 'city_id' => $giza_id],
    ['name' => 'ساقية مكى', 'city_id' => $giza_id],
    ['name' => 'ناهيا', 'city_id' => $giza_id],
    ['name' => 'دهشور', 'city_id' => $giza_id],
///////////////////////////////////


            // Add more areas as needed
        ];

        DB::table('areas')->insert($areas);
    }
}
