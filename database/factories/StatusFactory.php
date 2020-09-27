<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Models\Status::class, function (Faker $faker) {
    $data_time =$faker->date . ' ' . $faker->time;
    return [
        'user_id'    => $faker->randomElement(['1', '2', '3']),
        'content'    => $faker->text(),
        'created_at' => $data_time,
        'updated_at' => $data_time,
    ];
});
