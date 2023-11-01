<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            [
                'name_en' => 'Talks',
                'name_ar' => 'المحادثة',
                'icon' => 'microphone.svg',
                'background' => '#005afa',
            ],
            [
                'name_en' => 'Networking',
                'name_ar' => 'الشبكات',
                'icon' => 'network.svg',
                'background' => '#ff3264',
            ],
            [
                'name_en' => 'Work',
                'name_ar' => 'العمل',
                'icon' => 'work.svg',
                'background' => '#00c864',
            ],

        ];
        foreach ($datas as $data) {
            Category::create($data);
        }
    }
}
