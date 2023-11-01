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

                'name_en' => 'Finish Forza horizon 5 race',
                'name_ar' => 'ألعاب',
                'description_ar' => 'By finishing the challenge you will claim 2500 points and ',
                'description_en' => 'By finishing the challenge you will claim 2500 points and ',
                'cover_image' => 'default-challenge.svg',
                'pointes' => 2500,
                'player_number' => 10,
                'match_number' => 5,
                'number_top' => 3,
                'challenge_category_id' => 1,
                'link' => 'url',
            ],
            [

                'name_en' => 'Win a street fighter match',
                'name_ar' => 'ألعاب',
                'description_ar' => 'By finishing the challenge you will claim 2500 points and ',
                'description_en' => 'By finishing the challenge you will claim 2500 points and ',
                'cover_image' => 'pexels-luis-quintero-2774556 1.svg',
                'pointes' => 2500,
                'player_number' => 10,
                'match_number' => 5,
                'number_top' => 3,
                'challenge_category_id' => 2,
                'link' => 'url',
            ],


        ];
        foreach ($datas as $data) {
            Challenge::create($data);
        }
    }
}
