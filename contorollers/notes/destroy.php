<?php

use Core\App;
use Core\Database;
$db = App::resolve('Core\Database');
$heading = "Note";
$currentUsserId = 1;

$note = $db->query('select * from notes where id = :id', [
    'id' => $_POST['id'],
])->findOrFail();

authorize($note['user_id'] !== $currentUsserId);

$db->query('delete from notes where id = :id', [
    'id' => $_POST['id'],
]);

header('location: /my-app/notes');
exit();
