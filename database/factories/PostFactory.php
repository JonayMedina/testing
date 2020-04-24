<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Post::class, function (Faker $faker) {
	$name = $faker->sentence(4);
    return [
    	'user_id' => rand(1,20),
        'name' => $name,
        'slug' => Str::slug($name),
        'description' => $faker->text(100),
        'url' => $faker->imageUrl($width = 500, $height =250),
        'active' => rand(0,1)
        
    ];
});
