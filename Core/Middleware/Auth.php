<?php

namespace Core\Middleware;

class Auth{

  public function handle(){
    if (!$_SESSION['user'] ?? false) {
      header('location: /my-app');
      exit();
    }
  }

}