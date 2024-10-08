<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IndustriesAndMajorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $industries = [
            [
                'name' => 'تكنولوجيا المعلومات',
                'majors' => [
                    'هندسة البرمجيات', 'علوم البيانات', 'أمن المعلومات', 'تطوير الويب', 'الشبكات'
                ]
            ],
            [
                'name' => 'الرعاية الصحية',
                'majors' => [
                    'التمريض', 'الطب', 'الصيدلة', 'العلاج الطبيعي', 'طب الأسنان'
                ]
            ],
            [
                'name' => 'الماليات',
                'majors' => [
                    'المحاسبة', 'البنوك والاستثمار', 'التخطيط المالي', 'الاقتصاد'
                ]
            ],
            [
                'name' => 'المعمار',
                'majors' => [
                  'المقاولات', 'الهندسة المدنية', 'الهندسة المعمارية', 'إدارة المشاريع', 'خدمات البناء'
                ]
            ],
            [
                'name' => 'التعليم',
                'majors' => [
                    'التدريس', 'تطوير المناهج', 'علم النفس التربوي', 'التعليم الخاص'
                ]
            ],
            [
                'name' => 'السياحة',
                'majors' => [
                    'إدارة الفنادق', 'إدارة السياحة', 'إدارة الفعاليات'
                ]
            ],
            [
                'name' => 'السيارات',
                'majors' => [
                    'الهندسة الميكانيكية', 'تكنولوجيا السيارات', 'تصميم السيارات'
                ]
            ],
            [
                'name' => 'التجارة',
                'majors' => [
                    'التسويق بالتجزئة', 'إدارة المبيعات', 'التجارة الإلكترونية', 'التسويق للتجزئة'
                ]
            ],
            [
                'name' => 'الاتصالات',
                'majors' => [
                    'هندسة الشبكات', 'بنية الاتصالات', 'الاتصالات اللاسلكية'
                ]
            ],
            [
                'name' => 'التصنيع',
                'majors' => [
                    'التصميم الصناعي', 'إدارة سلسلة التوريد', 'مراقبة الجودة'
                ]
            ],
			[
				'name' => 'الطاقة والبتروكيماويات',
				'majors' => [
					'هندسة البترول', 'الطاقة المتجددة', 'هندسة الكيمياء', 'تكنولوجيا البتروكيماويات'
				]
			],
			[
				'name' => 'الصناعات الغذائية',
				'majors' => [
					'الهندسة الغذائية', 'تصنيع المشروبات', 'السلامة الغذائية', 'تطوير منتجات الأغذية'
				]
			],
			[
				'name' => 'الطباعة والنشر',
				'majors' => [
					'تحرير النصوص', 'تصميم الجرافيك', 'إدارة الطباعة', 'تقنيات النشر الرقمي'
				]
			],
			[
				'name' => 'الأبحاث والتطوير',
				'majors' => [
					'البحث العلمي', 'التطوير التكنولوجي', 'الابتكار والاختراع', 'علم البيانات'
				]
			],
			[
				'name' => 'الفنون والتصميم',
				'majors' => [
					'الفنون التشكيلية', 'التصميم الداخلي', 'التصميم الصناعي', 'الأزياء والموضة','تصميم الجرافيك'
				]
			],
			[
				'name' => 'الترفيه والفنون الإبداعية',
				'majors' => [
					'التمثيل', 'السينما', 'الموسيقى', 'الرقص', 
				]
			],
			[
				'name' => 'الأمن والدفاع',
				'majors' => [
					'الأمن السيبراني', 'الدفاع والأمن القومي', 'الاستخبارات العسكرية', 'التخطيط الاستراتيجي'
				]
			],

        ];

        // Insert Industries and Majors
        foreach ($industries as $industry) {
            $industry_id = DB::table('industries')->insertGetId([
                'name' => $industry['name'],
            ]);

            // Insert Majors for each Industry
            foreach ($industry['majors'] as $major) {
                DB::table('majors')->insert([
                    'name' => $major,
                    'industry_id' => $industry_id,
                ]);
            }
        }
    }
}
