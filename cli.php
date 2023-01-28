<?php

use GeekBrains\LevelTwo\Blog\Comment;
use GeekBrains\LevelTwo\Blog\Post;
use GeekBrains\LevelTwo\Person\User;

include __DIR__ . '/vendor/autoload.php';

$faker = Faker\Factory::create('ru_RU');

var_dump($argv);

$name = new User(1, $faker->firstName, $faker->lastName);

$post = new Post(1, $name, $faker->title, $faker->text);

$comment = new Comment(1, $name, $post, $faker->text);