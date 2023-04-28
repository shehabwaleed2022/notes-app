<?php
use Core\App;
use Core\Database;
use Core\Validator;
use Http\Forms\LoginForm;

$db = App::resolve(Database::class);
$email = $_POST['email'];
$password = $_POST['password'];

// login the user if the credentials match.

$form = new LoginForm();

if (!$form->validate($email, $password)) {
  return view('session/create.view.php', [
    'errors' => $form->errors(),
  ]);
} else {
  view('session/create.view.php');
}




// match credentials
$user = $db->query('select * from users where email = :email', [
  'email' => $email,
])->find();


//we have the user and we will Check the password for that account.
if ($user) {
  if (password_verify($password, $user['pass'])) {
    login([
      'email' => $email,
      'user' => true,
      'username' => $user['username'],
    ]);
    header('location: /notes-app');
    exit();
  }

}

// If the password or email validation fails
return view('session/create.view.php', [
  'errors' => [
    'email' => 'No matching account found for that email address , and password.',
  ]
]);