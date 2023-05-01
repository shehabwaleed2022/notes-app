<?php
use Http\Forms\LoginForm;
use Core\Authanticator;

// We here are applying the PRG Pattern 
// PRG => Post Redirect Get

// Validations

$form = LoginForm::validate($attributes = [
  'email' => $_POST['email'],
  'password' => $_POST['password']
]);



// Authantication

$signedIn = (new Authanticator)->attempt(
  $attributes['email'], $attributes['password']
);

if (!$signein) { // Guard class
  $form->error(
    'email', 'No matching account found for that email address , and password.'
    )->throw();
}

redirect('/notes-app/');