<?php

use Faker\Generator as Faker;
use LaraDev\Model\Post;

$faker = \Faker\Factory::create('pt_BR');

$factory->define(Post::class, function (Faker $faker) {
    return [
        'titulo' => $faker->sentence(8),
        'subtitulo' => $faker->sentence(16),
        'descricao' => $faker->paragraph(19),
     ];
});
