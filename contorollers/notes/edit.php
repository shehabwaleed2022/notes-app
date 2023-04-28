<?php
use Core\Database;
use Core\App;


$db = App::resolve(Database::class);

$currentUsserId = 1;
$note = $db->query('select * from notes where id = :id', [
    'id' => $_GET['id'],
])->findOrFail();

authorize($note['user_id'] !== $currentUsserId);

$errors = [];

view('notes/edit.view.php', [
    'heading' => "Edit Note",
    'note' => $note,
]);
