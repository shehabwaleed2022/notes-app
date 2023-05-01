<?php

namespace Http\Forms;

use Core\ValidationExeption;
use Core\Validator;

class LoginForm
{

  protected $errors = [];
  public function __construct(public array $attributes)
  {
    // Validation process
    $this->attributes = $attributes;
    if (!Validator::email($attributes['email'])) {
      $this->errors['email'] = 'Please enter a valid email address.';
    }

    if (!Validator::string($attributes['password'])) {
      $this->errors['password'] = 'Please enter a valid password.';
    }
  }
  public static function validate($attributes)
  {
    $instance = new static($attributes); // -> to create a new instance from the current class

    return ($instance->failed() ? $instance->throw() : $instance);
  }

  public function throw(){
    ValidationExeption::throw ($this->errors(), $this->attributes);
  }
  public function failed()
  {
    return count($this->errors);
  }

  public function errors()
  {
    return $this->errors;
  }

  public function error($field, $errorMsg)
  {
    $this->errors[$field] = $errorMsg;
    return $this;
  }

}