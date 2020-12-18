<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\NetworkNode;
use Faker\Generator as Faker;

$factory->define(NetworkNode::class, function (Faker $faker) {
    return [
        'address' => $faker->city
    ];
});
