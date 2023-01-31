<?php

use GeekBrains\LevelTwo\Blog\Commands\Arguments;
use GeekBrains\LevelTwo\Blog\Commands\CreateUserCommand;
use GeekBrains\LevelTwo\Blog\Post;
use GeekBrains\LevelTwo\Blog\Repositories\UsersRepository\SqlitePostRepository;
use GeekBrains\LevelTwo\Blog\Repositories\UsersRepository\SqliteUsersRepository;
use GeekBrains\LevelTwo\Blog\User;
use GeekBrains\LevelTwo\Blog\UUID;

include __DIR__ . '/vendor/autoload.php';

$connection = new PDO('sqlite:' . __DIR__ . '/blog.sqlite');

$faker = Faker\Factory::create('ru_RU');

$usersRepository = new SqliteUsersRepository($connection);
$postRepository = new SqlitePostRepository($connection);


$usersRepository->save(new User(UUID::random(), $faker->userName(), $faker->firstName(), $faker->lastName()));
$usersRepository->save(new User(UUID::random(), $faker->userName(), $faker->firstName(), $faker->lastName()));


//$command = new CreateUserCommand($usersRepository);
//
//try {
//    $command->handle(Arguments::fromArgv($argv));
//} catch (\Exception $e) {
//    echo "{$e->getMessage()}\n";
//}
