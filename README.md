# rapidlogin
A Laravel package that enhances developer experience by adding one-click user switching buttons to the screen, streamlining authentication during local development.

## Installation
⚠️ This package is not to be used in production.
```
composer require --dev veltisan/rapidlogin:dev-main
```

## Basic configuration
Add the following to your `.env` file
```
#bare minimum enable rapidlogin and to show the buttons
RAPIDLOGIN_ENABLED=true

#to define the users that will be displayed in the buttons (see Users section below)
#the format is `id:name,id:name,...`
#RAPIDLOGIN_USERS=1:John Doe,1337:Jane Doe

#set to false to hide the close button from the panel
#RAPIDLOGIN_SHOW_CLOSE_BUTTON=true

#change the route the user is redirected to after logging via the button. defaults to 'home'
#RAPIDLOGIN_HOME_ROUTE_NAME=home

#to define the routes on which the buttons are displayed
#examples: 'login', 'login*', ... defaults to '*' to match all routes. Separate multiple route names with a comma.
#RAPIDLOGIN_ROUTE_NAME_PATTERN='*'
```

### Users
By default, rapid login buttons for first 3 users from dabatase will be displayed.
You can set the users in `.env` file, but if you want to set the users in a more clean format, publish the config (see below) and set the `users` value.

`key` is the user's `id` in database, and `value` is displayed in the button

```
'users' => [
    1 => 'admin',
    3 => 'manager',
    5 => 'customer',
],
```

## Publishing config and view
```
php artisan vendor:publish --tag=rapidlogin-config
```

This publishes a `blade view`, you are free to modify it to fit with your layout.
```
php artisan vendor:publish --tag=rapidlogin-views
```

