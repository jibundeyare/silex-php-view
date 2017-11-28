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
      views/
        hello.php
      web/
        index.php

## registering

    // web/index.php
    $app->register(new SilexPhpView\ViewServiceProvider(), [
        'view.path' => __DIR__.'/../views',
    ]);

## usage

    // web/index.php
    $app->get('/test', function() use($app) {
        $greeting = 'Hello!';

        return $app['view']->render('hello.php', [
            'greeting' => $greeting,
        ]);
    });

    // views/hello.php
    echo $greeting;
