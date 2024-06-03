<?php
    return [
        '/' => 'HomeController@index',
        '/user/{id}' => 'UserController@loadUserData',
        '/user/{id}/log-out' => 'UserController@logOut',
        '/user/{id}/create-post' => 'PostController@createPost',
        '/login' => 'UserController@signIn',
        '/register' => 'UserController@createNewUser',
        '/posts/{id}' => 'PostController@loadPostData',
        '/posts/{id}/new-commentary' => 'CommentaryController@createCommentary',
        '/posts/{id}/commentary/{id}/delete-commentary' => 'CommentaryController@deleteCommentary'
    ];

?>