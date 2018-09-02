<?php

require_once 'vendor/autoload.php';

app()->bootProvider();

app()->run();

/*$t = app()->make(\core\database\migrations\create_user_table::class);
dd($t->up());*/

