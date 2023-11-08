<?php

namespace Database\Seeders;

use App\Models\Challenge;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChallengeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [

                'name_en' => 'Drone Zone',
                'name_ar' => 'اختراق الدرونز',
                'description_ar' => 'التحكم في طائرات الدرونز واختراق الأنظمة الأمنية لهذه الطائرات بنجاح.',
                'description_en' => 'Hack drones and fly them across an obstacle.',
                'cover_image' => 'challanges.svg',
                'pointes' => 2500,
                'player_number' => 10,
                'match_number' => 5,
                'number_top' => 3,
                'challenge_category_id' => 1,
                'link' => 'url',
            ],
            [

                'name_en' => 'Chip Off Village',
                'name_ar' => 'اختراق الرقائق الإلكترونية',
                'description_ar' => 'هندسة شريحة  eMMC  لاستعدة البيانات من الأجهزة المخترقة ',
                'description_en' => 'Remove embedded emmc chips from devices and gain access control.',
                'cover_image' => 'challanges.svg',
                'pointes' => 2500,
                'player_number' => 10,
                'match_number' => 5,
                'number_top' => 3,
                'challenge_category_id' => 1,
                'link' => 'url',
            ],
            [

                'name_en' => 'Bong Bounty',
                'name_ar' => 'مكافأت الثغرات',
                'description_ar' => 'البحث عن الثغرات الأمنية علي تطبيقات الويب والأجهزة لمؤسسات حقيقية. ',
                'description_en' => 'Conducting bug hunts on real-world companies.',
                'cover_image' => 'challanges.svg',
                'pointes' => 2500,
                'player_number' => 10,
                'match_number' => 5,
                'number_top' => 3,
                'challenge_category_id' => 1,
                'link' => 'url',
            ],
            [

                'name_en' => 'Medical Hacking',
                'name_ar' => 'اختراق الأجهزة الطبية',
                'description_ar' => 'تجربة تفاعلية للتوعية بمخاطر اختراق الأجهزة الطبية.',
                'description_en' => 'A hands-on experience to raise awareness of the risks of medical device hacking.',
                'cover_image' => 'challanges.svg',
                'pointes' => 2500,
                'player_number' => 10,
                'match_number' => 5,
                'number_top' => 3,
                'challenge_category_id' => 1,
                'link' => 'url',
            ],
            [

                'name_en' => 'Lockpick Village',
                'name_ar' => 'فك الأقفال',
                'description_ar' => 'تجربة فتح الأقفال بمستويات صعوبة مختلفة من خلال كشف نقاط الضعف فيها.  ',
                'description_en' => 'Discovering techniques and vulnerabilities of different locking devices.',
                'cover_image' => 'challanges.svg',
                'pointes' => 2500,
                'player_number' => 10,
                'match_number' => 5,
                'number_top' => 3,
                'challenge_category_id' => 1,
                'link' => 'url',
            ],
            [

                'name_en' => 'Cyber Escape Room',
                'name_ar' => 'الهروب من الغرفة',
                'description_ar' => 'تحدي واقعي يعتمد علي تعاون الفريق لحل سلسلة من الألغاز والأحاجي في إطار زمني محدود. ',
                'description_en' => 'Tackle a series cyber based puzzles withun a tight timeframe.',
                'cover_image' => 'challanges.svg',
                'pointes' => 2500,
                'player_number' => 10,
                'match_number' => 5,
                'number_top' => 3,
                'challenge_category_id' => 1,
                'link' => 'url',
            ],
            [

                'name_en' => 'Smart City Simulation',
                'name_ar' => 'اختراف المدينة الذكية',
                'description_ar' => 'استغلال الثغرات الأمنية للبنية التحتية في المنشأت وفق نموزج يحاكي قطاعات واقعية. ',
                'description_en' => 'Test your skills against real-world cyber threats of information infrastructure.',
                'cover_image' => 'challanges.svg',
                'pointes' => 2500,
                'player_number' => 10,
                'match_number' => 5,
                'number_top' => 3,
                'challenge_category_id' => 1,
                'link' => 'url',
            ],



        ];
        foreach ($datas as $data) {
            Challenge::create($data);
        }
    }
}
