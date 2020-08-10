<?php

    /** @var \Illuminate\Database\Eloquent\Factory $factory */

    use App\Answer;
    use Faker\Generator as Faker;
    use Illuminate\Support\Str;

    /*
    |--------------------------------------------------------------------------
    | Model Factories
    |--------------------------------------------------------------------------
    |
    | This directory should contain each of the model factory definitions for
    | your application. Factories provide a convenient way to generate new
    | model instances for testing / seeding your application's database.
    |
    */

    $factory->define(Answer::class, function (Faker $faker) {
        return [
            'title' => $faker->sentence,
            'question_id' => function(){
                return factory(\App\Question::class)->create()->id;
            },
            'correct' => (bool)random_int(0,1)
        ];
    });
