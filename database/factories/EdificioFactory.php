<?php

use Faker\Generator as Faker;

$factory->define(App\Edificio::class, function (Faker $faker) {
    return [
        //
        	'nombre'=>$faker->name,
        	'user_id'=> mt_rand(1,9),
    ];
});
