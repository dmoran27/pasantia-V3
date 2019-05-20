<?php

use Faker\Generator as Faker;

$factory->define(App\Tipo::class, function (Faker $faker) {
    return [
        //


    	'nombre'=>$faker->name,
    	'descripcion'=>$faker->sentence,
         'tipo' => $faker->randomElement(['Equipo', 'Software','Periferico','Componente']),
        'user_id'=> mt_rand(1,9),
    ];
});
