<?php
// This part display the errors to browser
ini_set('display_errors', 1);
ini_set('error_reporting', 1);

require 'Core/functions.php';
require 'Core/Router.php';
// Sessions
session_start();

spl_autoload_register(function ($class) {
  $class = str_replace('\\' ,  DIRECTORY_SEPARATOR , $class);
  require $class . '.php';
}); // Will automaticlly require the undefined classes into our project

require 'bootstrap.php';
echo "shehab";
$router = new \Core\Router();
$routes = require "routes.php";
$currentUrl = parse_url($_SERVER['REQUEST_URI'])['path'];

$method = isset($_POST['_method']) ? $_POST['_method'] : $_SERVER['REQUEST_METHOD'];

$router->route($currentUrl, $method);