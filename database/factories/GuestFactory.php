<?php

use Faker\Generator as Faker;
use App\Wedding;

$factory->define(App\Guest::class, function (Faker $faker) {
    return [
        'wedding_id' => function() {
          return Wedding::all()->random();
        },
        'name' => $faker->name,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'guest_token' => $faker->isbn13,
        'rsvp' => $faker->boolean($chanceOfGettingTrue = 50),
        'comment' => $faker->paragraph,
        'qrcode' => 'image.jpg'
    ];
});
