<?php
namespace App\Classes;
use Illuminate\Database\Capsule\Manager as Capsule;

class Database
{
  public function __construct()
  {
    $db = new Capsule;
    $db->addConnection([
      'driver' => getEnv('DB_DRIVER'),
      'host' =>  getEnv('DB_HOST'),
      'database' =>  getEnv('DB_NAME'),
      'username' =>  getEnv('DB_USERNAME'),
      'password' =>  getEnv('DB_PASSWORD'),
      'charset' =>  'utf8',
      'collation' =>  'utf8_unicode_ci',
      'prefix' =>  ''
    ]);

    $db->setAsGlobal();
    $db->bootEloquent();
  }
}
