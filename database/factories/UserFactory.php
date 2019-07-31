<?php

use Faker\Generator as Faker;

$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'nom' => 'Dosso',
        'prenoms' => 'Mory Souahlio',
        'contact_1' => '09 52 54 60',
        'email' => 'mory.itduck@gmail.com',
        'password' => bcrypt('secret'), // secret
        'remember_token' => null,
    ];
});
