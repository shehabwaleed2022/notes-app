<?php
use Core\Validator;
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

//Check if the data is valid
$errors = [];
if(! Validator::email($email)){
  $errors['email'] = 'Please enter a valid email address.';
}

if (! Validator::string($password , 7, 255)) {
  $errors['password'] = 'Please enter a valid password, at least seven characters.';
}

if(! empty($errors)){
  return view('registration/create.view.php', [
    'errors' => $errors,
  ]);
}

// Check if the user has account allready
$user = $db->query('select * from users where email = :email',[
  'email' => $email,
])->find();

if($user){
  // User allready have an account 
  //if yes, redirect to login page
  header('location: /my-app');
  exit();
}else {
  // if no, save the account to datebase, then log the user in , then redirect the user to home page
  $db->query('INSERT INTO users(username , email , pass) VALUES(:username , :email , :pass)', [
    'username' => $name,
    'email' => $email,
    'pass' => password_hash($password,PASSWORD_BCRYPT),
  ]);

  // mark that the user has logged in
  login($user);

  header('location: /my-app');
  exit();
}


