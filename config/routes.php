<?php
    return [
        '/' => 'HomeController@index',
        '/users/{id}' => 'UserController@index',
        '/login' => 'LoginController@loadForm',
        '/register' => 'UserController@loadSignUpForm',
        '/register/new-user' => 'UserController@newUser',
        '/create-post-form' => 'PostController@createPostForm',
        '/create-post' => 'PostController@createPost'
    ];

?>