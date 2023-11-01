<?php

namespace Database\Seeders;

use App\Models\Agenda;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AgendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [

                'name_en' => 'Games',
                'name_ar' => 'ألعاب',
                'description_ar' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the  standard dummy text ever since the 1500s',
                'description_en' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the  standard dummy text ever since the 1500s',
                'cover_image' => 'event.svg',
                'profile_image' => 'pic.svg',
                'date' => '2023-10-03',
                'time' => '03:10:00',
                'address' => '8501 King Fahd Rd, Al Rawabi',
                'city' => 'Riyadh',
                'category_id' => 1,

            ],
            [
                'name_en' => 'In Real life',
                'name_ar' => 'الحياة الواقعية',
                'description_ar' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the  standard dummy text ever since the 1500s',
                'description_en' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the  standard dummy text ever since the 1500s',
                'cover_image' => 'event.svg',
                'profile_image' => 'pic.svg',
                'date' => '2023-10-03',
                'time' => '03:10:00',
                'address' => 'King Fahd Rd, Al Aliyah',
                'city' => 'Riyadh',
                'category_id' => 2,

            ],
            [
                'name_en' => 'Cards',
                'name_ar' => 'البطاقات',
                'description_ar' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the  standard dummy text ever since the 1500s',
                'description_en' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the  standard dummy text ever since the 1500s',
                'cover_image' => 'event.svg',
                'profile_image' => 'pic.svg',
                'date' => '2023-10-03',
                'time' => '03:10:00',
                'address' => 'King Fahd Rd, Al Aliyah',
                'city' => 'Riyadh',
                'category_id' => 3,

            ],

        ];
        foreach ($datas as $data) {
            Agenda::create($data);
        }
    }
}
