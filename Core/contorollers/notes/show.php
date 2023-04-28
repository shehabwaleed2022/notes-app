<?php
use Core\App;
use Core\Database;

$db = App::resolve('Core\Database');

$currentUsserId = 1;

$note = $db->query('select * from notes where id = :id', [
    'id' => $_GET['id'],
])->findOrFail();

authorize($note['user_id'] !== $currentUsserId);

view('notes/show.view.php',[
  'heading'=>"Note",
  'note' =>$note,
]);
