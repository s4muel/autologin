<?php

return [
    'enabled' => env('RAPIDLOGIN_ENABLED', false),

    'show_close_button' => env('RAPIDLOGIN_SHOW_CLOSE_BUTTON', true),

    //when empty, first 3 users from database will be used
    'users' => [
        //1 => 'admin',
    ],

    'user_model' => env('RAPIDLOGIN_USER_MODEL', App\Models\User::class),

    //to be used in route model binding
    'user_route_key_name' => env('RAPIDLOGIN_USER_ROUTE_KEY_NAME', 'id'),

    //examples: 'login', 'login*', ... defaults to '*' to match all routes
    'route_name_pattern' => env('RAPIDLOGIN_ROUTE_NAME_PATTERN', '*'),
];
