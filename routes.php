<?php



$router->get('/notes-app/', 'home.php');
$router->get('/notes-app/about', 'about.php');
$router->get('/notes-app/contact', 'contact.php');

$router->get('/notes-app/notes', 'notes/index.php')->only('auth');
$router->get('/notes-app/note', 'notes/show.php');
$router->get('/notes-app/notes/create', 'notes/create.php');
$router->post('/notes-app/notes/create', 'notes/store.php');

$router->get('/notes-app/note/edit', 'notes/edit.php');
$router->patch('/notes-app/note/edit', 'notes/update.php');

$router->delete('/notes-app/note/edit', 'notes/destroy.php');

$router->get('/notes-app/register', 'registration/create.php')->only('guest');
$router->post('/notes-app/register', 'registration/store.php')->only('guest');

$router->get('/notes-app/login', 'session/create.php')->only('guest');
$router->post('/notes-app/login', 'session/store.php')->only('guest');
$router->delete('/notes-app/session', 'session/destroy.php')->only('auth');