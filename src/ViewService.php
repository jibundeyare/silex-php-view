<?php

namespace SilexPhpView;

use Pimple\Container;

class ViewService
{
    private $app;
    private $path;

    public function __construct(Container $app, $path)
    {
        $this->app = $app;
        $this->path = $path;
    }

    public function render($view, array $parameters = array())
    {
        $parameters['app'] = $this->app;

        return self::evalTemplate($this->path . '/' . $view, $parameters);
    }

    public static function evalTemplate($file, array $parameters = [])
    {
        extract($parameters, EXTR_SKIP);
        unset($parameters);
        ob_start();
        require $file;
        unset($file);

        return ob_get_clean();
    }
}

