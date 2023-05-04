<?php
use Core\App;
use Core\Validator;

$db = App::resolve('Core\Database');
$currentUsserId = 1;

// Find the note
$note = $db->query('select * from notes where id = :id', [
  'id' => $_POST['id'],
])->findOrFail();

// Authorization
authorize($note['user_id'] !== $currentUsserId);

// Validate the form
$errors = [];
if (!Validator::string($_POST['body'], 1, 1000)) {
  $errors['body'] = 'A body of no more than 1,000 characters is required.';
}

// If no validation errors, update the record in notes table

if (count($errors)) {
  return view('notes/edit.view.php', [
    'heading' => 'Edit Note',
    'errors' => $errors,
    'note' => $note,
  ]);
}

$db->query('update notes set body =:body where id = :id', [
  'id' => $_POST['id'],
  'body' => $_POST['body'],
]);

// redirecet the user

header('location: ' . MAIN_NAME . '/notes');

die();