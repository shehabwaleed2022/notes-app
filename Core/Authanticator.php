<?php

namespace Core;

class Authanticator
{
  protected $db;

  public function attempt($email, $password)
  {
    $this->db= App::resolve(Database::class);
    $user = $this->db->query('select * from users where email = :email', [
      'email' => $email,
    ])->find();

    if ($user) {
      if (password_verify($password, $user['pass'])) {
        $this->login([
          'email' => $email,
          'user' => true,
          'username' => $user['username'],
        ]);
        return true;
      }

    }
    return false;
  }

  public function login($user)
  {
    $_SESSION['user'] = [
      'email' => $user['email'],
      'username' => $user['username'],
    ];
    session_regenerate_id(true); // To have a high security
  }


  public function logout()
  {
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
}