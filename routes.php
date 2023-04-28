<?php

// The old router
// return [
// '/my-app/' => 'contorollers/home.php',
// '/my-app/contact' => 'contorollers/contact.php',
// '/my-app/about' => 'contorollers/about.php',
// '/my-app/notes' => 'contorollers/notes/index.php',
// '/my-app/note' => 'contorollers/notes/show.php',
// '/my-app/notes/create' => 'contorollers/notes/create.php',
// ];
// 


$router->get('/notes-app/', 'contorollers/home.php');
$router->get('/notes-app/about', 'contorollers/about.php');
$router->get('/notes-app/contact', 'contorollers/contact.php');

$router->get('/notes-app/notes', 'contorollers/notes/index.php')->only('auth');
$router->get('/notes-app/note', 'contorollers/notes/show.php');
$router->get('/notes-app/notes/create', 'contorollers/notes/create.php');
$router->post('/notes-app/notes/create', 'contorollers/notes/store.php');

$router->get('/notes-app/note/edit', 'contorollers/notes/edit.php');
$router->patch('/notes-app/note/edit', 'contorollers/notes/update.php');

$router->delete('/notes-app/note/edit', 'contorollers/notes/destroy.php');

$router->get('/notes-app/register', 'contorollers/registration/create.php')->only('guest');
$router->post('/notes-app/register', 'contorollers/registration/store.php')->only('guest');

$router->get('/notes-app/login', 'contorollers/session/create.php')->only('guest');
$router->post('/notes-app/login', 'contorollers/session/store.php')->only('guest');
$router->delete('/notes-app/session', 'contorollers/session/destroy.php')->only('auth');