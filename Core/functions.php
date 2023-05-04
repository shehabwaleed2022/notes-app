<?php

function dd($value)
{
  echo '<pre>';
  var_dump($value);
  echo '</pre>';
  die();
}
function abort($statusCode = 404)
{
  http_response_code($statusCode);
  require "views/$statusCode.php";
  die();
}

function base_path($path)
{
  return BASE_PATH . $path;
}
function authorize($condition, $status = 403)
{
  if ($condition) {
    abort($status);
  }

}

function view($path, $attributes = [])
{
  extract($attributes);
  require base_path("views/" . $path);
}


function redirect($path)
{
  header("location: {$path}");
  exit();
}

function old($key, $default = "")
{
  return Core\Session::get('old')[$key] ?? $default;
}