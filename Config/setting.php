<?php

    return [
      'db.username' => \DI\env('db_username', 'eddie'),
      'db.password' => \DI\env('db_password', '1111'),
      'db.host' => \DI\env('db_host', 'localhost'),
      'db.name' => \DI\env('db_name', 'udemy'),
      \Core\Model::class => \DI\create()->constructor(
                                \DI\get('db.name'),
                                \DI\get('db.username'),
                                \DI\get('db.password'),
                                \DI\get('db.host')
                             )
    ];