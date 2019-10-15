<?php

use Illuminate\Database\Seeder;

class CreateEventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Event::class, 50)->create();
    }
}
