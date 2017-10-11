<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Answer::class, function (Faker\Generator $faker) {
    return [
        'answer_one' => $faker->numberBetween(1, 5),
        'answer_two' => $faker->numberBetween(1, 5),
        'answer_three' => $faker->numberBetween(1, 5),
        'answer_four' => $faker->numberBetween(1, 5),
        'answer_five' => $faker->numberBetween(1, 5),
        'label' => $faker->numberBetween(1, 3),
        'created_at' => $faker->dateTimeThisYear('now'),
        'updated_at' => $faker->dateTimeThisYear('now')
    ];
});
