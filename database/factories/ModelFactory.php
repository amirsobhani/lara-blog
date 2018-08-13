<?php

use Faker\Generator as Faker;
//
$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Article::class, function (Faker $faker) {
    $title = $faker->sentence;
    return [
        'user_id'=> $faker->numberBetween(1, 5),
        'title'=> $title,
        'content'=> $faker-> text(),
        'slug'=> str_slug($title),
        'viewCount'=> 0,
        'commentCount'=> 0
    ];
});
