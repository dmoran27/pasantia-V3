<?php

use Faker\Generator as Faker;

$factory->define(App\Periferico::class, function (Faker $faker) {
    return [

    	'nombre'=>$faker->name,
        'tipo_id'=>mt_rand(1,9),
        'user_id'=>mt_rand(1,9),

        //
    ];
});
