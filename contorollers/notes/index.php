<?php
use Core\Database;
use Core\Validator;
use Core\App;
$db = App::resolve('Core\Database');

$notes = $db->query('select * from notes where user_id = 1')->get();


view('notes/index.view.php', [
    'heading' => "My Notes",
    'notes' => $notes,
]);


