<?php

namespace Core;

class Session
{
  public static function has($key)
  {
    return (bool) static::get($key);
  }
  public static function put($key, $value)
  {
    $_SESSION[$key] = $value;
  }

  public static function get($key, $default = null)
  {
      return $_SESSION['_flash'][$key]?? $_SESSION[$key] ?? $default;
  }

  public static function flash($key, $value)
  {
    $_SESSION['_flash'][$key] = $value;
  }

  public static function unflash()
  {
    unset($_SESSION['_flash']);
  }

  public static function flush(){ // To clear the session
    $_SESSION = [];
  }

  public static function destroy(){
    static::flush(); // create our session super global
    session_destroy();

    // Delete the cookie
    $params = session_get_cookie_params();
    setcookie('PHPSESSID', '', [
      'expires' => 3600,
      'domain' => $params['domain'],
      'path' => $params['path'],
    ]);
  }
}