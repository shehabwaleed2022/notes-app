<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve('Core\Database');
$errors = [];

if (!Validator::string($_POST['body'], 1, 1000)) {
  $errors['body'] = 'A body of no more than 1,000 characters is required.';
}

if (empty($errors)) {
  $db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
    'body' => $_POST['body'],
    'user_id' => 1,
  ]);
  // Redirecet the user to his notes page
  header('location: ' . MAIN_NAME  . '/notes');
  exit();
} else {
  return view('notes/create.view.php', [
    'heading' => "Create Note",
  ]);


}