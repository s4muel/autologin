# rapidlogin
A Laravel package that enhances developer experience by adding one-click user switching buttons to the screen, streamlining authentication during local development.

## Installation
⚠️ This package is not to be used in production.
```
composer require --dev veltisan/rapidlogin:dev-main
```

## Basic configuration

```
RAPIDLOGIN_ENABLED=true
#RAPIDLOGIN_SHOW_CLOSE_BUTTON=true #set to false to hide the close button from the panel
#RAPIDLOGIN_HOME_ROUTE_NAME=home
```
By default, rapid login buttons for first 3 users from dabatase will be displayed, if you want to customize the users, publish the config (see below) and set the `users` value.

`key` is the user's `id` in database, and `value` is displayed in the button

```
'users' => [
    1 => 'admin',
    3 => 'manager',
    5 => 'customer',
],
```

## Publishing config and view
Run `php artisan vendor:publish` and select `Veltisan\RapidLogin\rapidLoginProvider`

Tis publishes also a `blade view`, you are free to modify it to fit with your layout.