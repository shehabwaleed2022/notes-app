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

function authorize($condition, $status = 403)
{
  if ($condition) {
    abort($status);
  }

}

function view($bath, $attributes = [])
{
  extract($attributes);
  require "views/" . $bath;
}

function base_path($path){
  return BASE_PATH . $path; 
}

function redirect($path){
  header("location: {$path}");
  exit();
}