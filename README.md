# SilexPhpView

A minimal php view service for silex framework

## install

Open a terminal, go to your project directory and type:

    composer require jibundeyare/silex-php-view

## parameters

view.path : Path to the directory containing php template files.

## views directory

It is recommended to create a separate directory to store the views.

In the examples, we use the following directory structure:

    project/
      public/
        index.php
      templates/
        hello.php
      vendor/

## registering

    use SilexPhpView\ViewServiceProvider;

    // ...

    $app->register(new ViewServiceProvider(), [
        'view.path' => __DIR__.'/../templates',
    ]);

## usage

Create a PHP template file `templates/hello.php` :

    <!-- templates/hello.php -->
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8" />
            <title><?php echo $greeting; ?></title>
        </head>
        <body>
            <h1><?php echo $greeting; ?></h1>
        </body>
    </html>

Create a PHP entry file `public/index.php` :

    <?php
    // public/index.php

    use SilexPhpView\ViewServiceProvider;

    // ...

    $app->register(new ViewServiceProvider(), [
        'view.path' => __DIR__.'/../templates',
    ]);

    $app->get('/hello', function() use($app) {
        $greeting = 'Hello!';

        return $app['view']->render('hello.php', [
            'greeting' => $greeting,
        ]);
    });

In your terminal, start a web server :

    php -S localhost:8000 -t public

And enjoy the result : [http://localhost:8000/hello](http://localhost:8000/hello).

