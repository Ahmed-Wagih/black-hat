<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AdminSeeder::class,
            RoleSeeder::class,
            PermissionSeeder::class,
            UserSeeder::class,
            InterestSeeder::class,
            CategorySeeder::class,
            AgendaSeeder::class,
            ChallengeCategorySeeder::class,
            ChallengeSeeder::class,

        ]);


    }
}
