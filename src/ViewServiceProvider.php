<?php

namespace SilexPhpView;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ViewServiceProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $app['view'] = function () use ($app) {
            return new ViewService($app, $app['view.path']);
        };
    }
}

