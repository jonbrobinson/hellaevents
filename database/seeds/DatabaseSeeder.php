<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call([
            OrganizationsTableSeeder::class,
            SocialAccountTypesTableSeeder::class,
            TableTypesTableSeeder::class,
        ]);
    }
}
