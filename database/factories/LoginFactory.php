<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Login::class, function (Faker $faker) {
    $ip = ['1.1.1.1', '2.2.2.2', '3.3.3.3', '4.4.4.4', '5.5.5.5'];
    return [
        'user_id' => rand(1,5),
        'ip_address' => $ip[rand(0,4)],
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now()
    ];
});
