<?php

namespace SilexPhpView;

use Pimple\Container;
use RawPhpView\ViewService as RawPhpViewService;

class ViewService extends RawPhpViewService
{
    private $app;

    public function __construct(Container $app, $path)
    {
        parent::__construct($path);
        $this->app = $app;
    }

    public function render($view, array $parameters = array())
    {
        $parameters['app'] = $this->app;

        return parent::render($view, $parameters);
    }
}

