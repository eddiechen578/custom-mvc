<?php
    date_default_timezone_set('Asia/Taipei');
    define('APP_CHARSET', 'UTF8');
    define('SITE_LANG', 'zh_TW');
    define('DB_PREFIX', 'udemy');

    $CONFIG['DB'] = [
            'host' => $localhost = 'localhost',
            'dsn' => 'mysql:host='.$localhost.';dbname='.DB_PREFIX.';charset=utf8',
            'user' => 'eddie',
            'password' => '1111'
        ];

