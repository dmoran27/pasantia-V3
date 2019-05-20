<?php

use Faker\Generator as Faker;

$factory->define(App\Ticket::class, function (Faker $faker) {
    return [
        //
 			

        
            'identificador'=> str_random(18),
            'estado'=> $faker->randomElement(['Asignado','Abierto','Cerrado','En espera']),
            'accion'=> $faker->randomElement(['Solventado','Revisado','Sin Solucion']),
            'prioridad'=> $faker->randomElement(['Alta','Media','Baja']),
            'observacion'=>$faker->sentence,
            'tiempo_i'=>$faker->timezone,
            'tiempo_c'=>$faker->timezone,
            'user_id'=>mt_rand(1,9),
            'cliente_id'=>mt_rand(1,9),
    ];
});
