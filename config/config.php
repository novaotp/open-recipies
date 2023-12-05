<?php
//site name
define('SITE_NAME', 'OpenRecipies');

//App Root
define('APP_ROOT', dirname(dirname(__FILE__)));
define('URL_ROOT', '/');
define('URL_SUBFOLDER', '/open-recipies');

//DB Params
define('DB_HOST', 'localhost:3306');
define('DB_USER', 'root');
define('DB_PASS', 'password');
define('DB_NAME', 'openrecipiesdb');

function unless(bool $condition, mixed $onSuccess, mixed $onFail): mixed
{
  return $condition ? $onSuccess : $onFail;
}
