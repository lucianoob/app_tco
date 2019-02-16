<?php

use Faker\Generator as Faker;

$factory->define(App\Supplier::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'phone' => sprintf('(%02d) %04d-%04d', rand(11, 99), rand(0, 9999), rand(0, 9999)),
    ];
});
