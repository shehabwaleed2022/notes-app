<?php

namespace Core;

use Core\Middleware\Middleware;
class Router
{
  protected $routes = [];

  protected function addRoute($uri, $controller, $method)
  {
    $this->routes[] = [
      'uri' => $uri,
      'controller' => $controller,
      'method' => $method,
      'middleware' => null, // The middleware will be set to null as default
    ];
    return $this;
  }

  public function post($uri, $controller)
  {
    $this->addRoute($uri, $controller, 'POST');
    return $this;
  }

  public function get($uri, $controller)
  {
    $this->addRoute($uri, $controller, 'GET');
    return $this;
  }

  public function delete($uri, $controller)
  {
    $this->addRoute($uri, $controller, 'DELETE');
    return $this;
  }

  public function put($uri, $controller)
  {
    $this->addRoute($uri, $controller, 'PUT');
    return $this;
  }

  public function patch($uri, $controller)
  {
    $this->addRoute($uri, $controller, 'PATCH');
    return $this;
  }

  public function only($key)
  {
    $this->routes[array_key_last($this->routes)]['middleware'] = $key;
  }

  public function route($uri, $method)
  {
    foreach ($this->routes as $route) {
      if ($route['uri'] === $uri && strtoupper($method) === $route['method']) {
        // Apply the middleware
        Middleware::resolve($route['middleware']);
        return require base_path('Http/controllers/' . $route['controller']);
      }
    }
    $this->abort();

  }

  public function previousUrl(){
    return $_SERVER['HTTP_REFERER'];
  }
  protected function abort($statusCode = 404)
  {
    http_response_code($statusCode);
    require "views/$statusCode.php";
    die();
  }

}