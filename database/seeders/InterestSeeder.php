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
                'name_ar' => 'هاكر اخلاقي',
                'name_en' => 'Ethical Hacker',
                'icon' => 'Ethical-Hacker.svg'
            ],
            [
                'name_ar' => 'التحديات التقنية',
                'name_en' => 'Technical Challenges',
                'icon' => 'Technical-challenges.svg'


            ],
            [
                'name_ar' => 'الوعي السيبراني',
                'name_en' => 'Cyber Awareness',
                'icon' => 'Cyber-Awareness.svg'

            ],

            [
                'name_ar' => 'التعاون الدولي',
                'name_en' => 'International Cooperation',
                'icon' => 'International-Cooperation.svg'

            ],
            [
                'name_ar' => 'الحماية الشخصية',
                'name_en' => 'Personal protection',
                'icon' => 'Personal-protection.svg'

            ],
            [
                'name_ar' => 'تقنيات الصحة الرقمية',
                'name_en' => 'Digital Health Technologies',
                'icon' => 'Digital-Health-Technologies.svg'

            ],

        ];
        foreach ($datas as $data) {
            Interest::create($data);
        }
    }
}
