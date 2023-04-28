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


$router->get('/my-app/', 'contorollers/home.php');
$router->get('/my-app/about', 'contorollers/about.php');
$router->get('/my-app/contact', 'contorollers/contact.php');

$router->get('/my-app/notes', 'contorollers/notes/index.php')->only('auth');
$router->get('/my-app/note', 'contorollers/notes/show.php');
$router->get('/my-app/notes/create', 'contorollers/notes/create.php');
$router->post('/my-app/notes/create', 'contorollers/notes/store.php');

$router->get('/my-app/note/edit', 'contorollers/notes/edit.php');
$router->patch('/my-app/note/edit', 'contorollers/notes/update.php');

$router->delete('/my-app/note/edit', 'contorollers/notes/destroy.php');

$router->get('/my-app/register', 'contorollers/registration/create.php')->only('guest');
$router->post('/my-app/register', 'contorollers/registration/store.php')->only('guest');

$router->get('/my-app/login', 'contorollers/session/create.php')->only('guest');
$router->post('/my-app/login', 'contorollers/session/store.php')->only('guest');
$router->delete('/my-app/session', 'contorollers/session/destroy.php')->only('auth');