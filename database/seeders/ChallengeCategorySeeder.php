<?php

namespace Database\Seeders;

use App\Models\ChallengeCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChallengeCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
              
                'name_en' => 'Games',
                'name_ar' => 'العاب',
                'icon' => 'games.svg',
            ],
            [
                'name_en' => 'In Real life',
                'name_ar' => 'الحياه الواقعية',
                'icon' => 'nature.svg',
            ],
            [
                'name_en' => 'Cards',
                'name_ar' => 'البطاقات',
                'icon' => 'food.svg',
            ],

        ];
        foreach($datas as $data) {
            ChallengeCategory::create($data);
        }
    }
}
