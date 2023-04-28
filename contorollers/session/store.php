<?php
use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);
$email = $_POST['email'];
$password = $_POST['password'];

// login the user if the credentials match.

$errors = [];
if (!Validator::email($email)) {
  $errors['email'] = 'Please enter a valid email address.';
}

if (!Validator::string($password)) {
  $errors['password'] = 'Please enter a valid password.';
}

if (! empty($errors)) {
  return view('session/create.view.php', [
    'errors' => $errors,
  ]);
}


// match credentials
$user = $db->query('select * from users where email = :email', [
  'email' => $email,
])->find();


//we have the user and we will Check the password for that account.
if($user){
  if(password_verify($password, $user['pass'])){
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