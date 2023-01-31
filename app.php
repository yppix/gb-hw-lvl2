<?php

use GeekBrains\LevelTwo\Blog\Comment;
use GeekBrains\LevelTwo\Blog\Post;
use GeekBrains\LevelTwo\Person\User;

include __DIR__ . '/vendor/autoload.php';

$faker = Faker\Factory::create('ru_RU');

var_dump($argv);


$user = new User($faker->randomDigitNotNull(), $faker->firstName(), $faker->lastName());

$post = new Post($faker->randomDigitNotNull(), $user, $faker->title(), $faker->text());

$comment = new Comment($faker->randomDigitNotNull(), $user, $post, $faker->text());

$route = $argv[1] ?? null;

switch ($argv[1]) {
    case "user":
        echo $user;
        break;
    case "post":
        echo $post;
        break;
    case "comment":
        echo $comment;
        break;
    default:
        echo "error try user post comment parameter";
}