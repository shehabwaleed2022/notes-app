<?php



$router->get(MAIN_NAME . '/', 'home.php');
$router->get(MAIN_NAME . '/about', 'about.php');
$router->get(MAIN_NAME . '/contact', 'contact.php');

$router->get(MAIN_NAME . '/notes', 'notes/index.php')->only('auth');
$router->get(MAIN_NAME . '/note', 'notes/show.php');
$router->get(MAIN_NAME . '/notes/create', 'notes/create.php');
$router->post(MAIN_NAME . '/notes/create', 'notes/store.php');

$router->get(MAIN_NAME . '/note/edit', 'notes/edit.php');
$router->patch(MAIN_NAME . '/note/edit', 'notes/update.php');

$router->delete(MAIN_NAME . '/note/edit', 'notes/destroy.php');

$router->get(MAIN_NAME . '/register', 'registration/create.php')->only('guest');
$router->post(MAIN_NAME . '/register', 'registration/store.php')->only('guest');

$router->get(MAIN_NAME . '/login', 'session/create.php')->only('guest');
$router->post(MAIN_NAME . '/login', 'session/store.php')->only('guest');
$router->delete(MAIN_NAME . '/session', 'session/destroy.php')->only('auth');