<?php
    return [
        '/' => 'HomeController@index',
        '/users/{id}' => 'UserController@index',
        '/login' => 'UserController@loadSingInForm',
        '/login/authenticate' => 'UserController@auth',
        '/register' => 'UserController@loadSignUpForm',
        '/register/new-user' => 'UserController@newUser',
        '/create-post-form' => 'PostController@createPostForm',
        '/create-post' => 'PostController@createPost',
        '/posts/{id}' => 'PostController@post'
    ];

?>