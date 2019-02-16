<?php

use Faker\Generator as Faker;

$factory->define(App\Company::class, function (Faker $faker) {
    return [
        'user_id' => 0,
        'name' => $faker->company,
        'cnpj' => sprintf('%03d.%03d.%03d/0001-%02d', rand(0, 999), rand(0, 999), rand(0, 999), rand(0, 99)),
        'email' => $faker->companyEmail,
        'phone' => sprintf('(%02d) %04d-%04d', rand(11, 99), rand(0, 9999), rand(0, 9999)),
        'cep' => sprintf('%05d-%03d', rand(0, 99999), rand(0, 999)),
        'address' => 'Rua '.$faker->address,
    ];
});
