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


function login($user)
{
  $_SESSION['user'] = [
    'email' => $user['email'],
    'username' => $user['username'],
  ];
  session_regenerate_id(true); // To have a high security
}


function logout(){
  $_SESSION = []; // create our session super global
  session_destroy();

  // Delete the cookie
  $params = session_get_cookie_params();
  setcookie('PHPSESSID', '', [
    'expires' => 3600,
    'domain' => $params['domain'],
    'path' => $params['path'],
  ]);
}