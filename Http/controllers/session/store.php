<?php
use Http\Forms\LoginForm;
use Core\Authanticator;

$email = $_POST['email'];
$password = $_POST['password'];

// Validations

$form = new LoginForm();

if ($form->validate($email, $password)) {
  $auth = new Authanticator();

  if ($auth->attempt($email, $password)) {
    redirect('/notes-app/');
  }

  $form->error('email', 'No matching account found for that email address , and password.');
}
return view('session/create.view.php', [
  'errors' => $form->errors(),
]);