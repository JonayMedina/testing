<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    
    return [
        'user_id' => rand(1,20),
        'post_id' => rand(1,20),
        'body' => $faker->text(100),
        'active' => rand(0,1),
        
    ];
});
 