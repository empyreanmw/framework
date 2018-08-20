<?php
$router->get(['about' => 'pagesController@about']);
$router->get(['index' => 'pagesController@index']);
$router->post(['guests' => 'guestController@store']);