<?php

namespace Database\Seeders;

use App\Models\Interest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InterestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $datas = [
            [
                'name_ar' => 'النشر والتسويق',
                'name_en' => 'Publishing & Marketing',
                'icon' => 'publishing-and-markiting.svg'
            ],
            [
                'name_ar' => 'تطوير وتصميم اللعبة',
                'name_en' => 'Game Development & Design',
                'icon' => 'gane-development.svg'


            ],
            [
                'name_ar' => 'إنشاء المحتوى والبث',
                'name_en' => 'Content Creation & Streaming',
                'icon' => 'Content Creation & Streaming.svg'

            ],

            [
                'name_ar' => 'الاستثمار وريادة الأعمال',
                'name_en' => 'Investment & Entrepreneurship',
                'icon' => 'Investment & Entrepreneurship.svg'

            ],
            [
                'name_ar' => 'مجتمع الألعاب والثقافة',
                'name_en' => 'Gaming Community & Culture',
                'icon' => 'Gaming Community & Culture.svg'

            ],
            [
                'name_ar' => 'الألعاب الرياضية والتنافسية',
                'name_en' => 'Sports & Competitive Gaming',
                'icon' => 'Sports & Competitive Gaming.svg'
            ],
            [
                'name_ar' => 'تطوير الاعمال',
                'name_en' => 'Business Development',
                'icon' => 'Business Development.svg'

            ],

        ];
        foreach ($datas as $data) {
            Interest::create($data);
        }
    }
}
