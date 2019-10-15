<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Event;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'user_id' => rand(1, 5),
        'privacy_event_id' => rand(1, 4),
        'location' => $faker->streetAddress,
        'presentation' => $faker->paragraph(1)
    ];
});
