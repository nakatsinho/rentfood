<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use RentFood\Models\Pedido;
use Faker\Generator as Faker;

$factory->define(Pedido::class, function (Faker $faker) {
    return [
        'status' => $faker->sentence,
        'total' => $faker->numberBetween($min = 1000, $max = 9000),
    ];
});
