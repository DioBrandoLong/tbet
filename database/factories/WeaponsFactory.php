<?php

use Faker\Generator as Faker;


$factory->define(App\Models\Weapons::class, function (Faker $faker) {
    $date_time=$faker->date. ' ' . $faker->time;
    static $password;
    return [
        'name'=>$faker->text(),
        'notes' => $password ?: $password = bcrypt('secret'),
        'price' => $password ?: $password = bcrypt('secret'),
        'created_at'=>$date_time,
        'updated_at'=>$date_time,
    ];
});
