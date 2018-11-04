<?php
$router->get(['register' => 'RegisterController@index']);
$router->post(['register' => 'RegisterController@create']);
$router->get(['logout' => 'LoginController@logout']);
$router->get(['home' => 'HomeController@index']);
$router->get(['login' => 'LoginController@index']);
$router->post(['login' => 'LoginController@login']);
