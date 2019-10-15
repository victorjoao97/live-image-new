<?php

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
        // $this->call(UsersTableSeeder::class);
        $this->call(CreateEventsSeeder::class);
        $this->call(CreateUserSeed::class);
        $this->call(CreatePrivacyEventsSeed::class);
    }
}
