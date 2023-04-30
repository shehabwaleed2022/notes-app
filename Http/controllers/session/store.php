<?php
use Core\Session;
use Http\Forms\LoginForm;
use Core\Authanticator;

// We here are applying the PRG Pattern 
// PRG => Post Redirect Get

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

Session::flash('errors', $form->errors());
Session::flash('old', [
  'email' => $_POST['email'],
]);
return redirect('/notes-app/login');


// return view('session/create.view.php', [
//   'errors' => $form->errors(),
// ]);