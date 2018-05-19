<?php

require_once __DIR__ . '/../bootstrap/init.php';

$app_name = getenv('APP_NAME');

use Illuminate\Database\Capsule\Manager as Capsule;
$user = Capsule::table('categories')->get();

echo '<br />';
var_dump($user->toArray());

// echo $app_name;
// var_dump(in_array('mod_rewrite', apache_get_modules()));
