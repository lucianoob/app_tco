<?php

use Faker\Generator as Faker;

$factory->define(App\Payment::class, function (Faker $faker) {
    return [
        'description' => $faker->paragraph(1),
        'payment' => rand(0, 99999) / 100,
        'date' => date("Y-m-d"),
    ];
});
