<?php
/** Start session if not already started ... */
if (!isset($_SESSION)) {
  session_start();
}

//local environment variable
require_once __DIR__ . '/../app/config/_env.php';

//instantiate database class
new \App\Classes\Database();

require_once __DIR__ . '/../app/routing/routes.php';

new \App\RouteDispatcher($router);
