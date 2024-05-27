<?php
    return [
        '/' => 'HomeController@index',
        '/users/{id}' => 'UserController@index',
        '/login' => 'LoginController@loadForm',
        '/register' => 'RegisterController@loadForm'
    ];

?>