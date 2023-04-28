<?php

use Core\Authanticator;

// log the user out

(new Authanticator)->logout();

redirect('/notes-app');