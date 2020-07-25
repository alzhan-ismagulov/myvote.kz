<?php

define("DEBUG", 0);
define("ROOT", dirname(__DIR__));
define("WWW", ROOT . '/public');
define("APP", ROOT . '/app');
define("CORE", ROOT . '/vendor/myvote/core');
define("LIBS", ROOT . '/vendor/myvote/core/libs');
define("CACHE", ROOT . '/tmp/cache');
define("CONFIG", ROOT . '/config');
//define("LAYOUT", 'myvote');
define("LAYOUT", 'default');

//http://myvote.kz/public/index.php
$app_path = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}";
//http://myvote.kz/public/
$app_path = preg_replace("#[^/]+$#", '', $app_path);
//http://myvote.kz
$app_path = str_replace('public/', '', $app_path);

define("PATH", $app_path);
define("ADMIN", PATH . 'admin');

require_once ROOT . '/vendor/autoload.php';