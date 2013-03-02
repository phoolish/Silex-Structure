<?php

namespace Project\Resources;

use Silex\Application as BaseApplication;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\UrlGeneratorServiceProvider;

class Application extends BaseApplication
{
    public function __construct()
    {
        parent::__construct();

        $this->registerParameters();
        $this->registerServiceProviders();
        $this->registerControllers();
        $this->registerModels();
        $this->registerRoutes();
    }

    private function registerParameters()
    {
        $this['debug'] = true;
    }

    private function registerServiceProviders()
    {
        $this->register(new ServiceControllerServiceProvider());
        $this->register(new UrlGeneratorServiceProvider());
    }

    private function registerControllers()
    {
        // Fix for 5.3 (still needed with php5.4 as silex does not support the rebind)
        $app = $this;
    }

    private function registerModels()
    {
        // Fix for 5.3 (still needed with php5.4 as silex does not support the rebind)
        $app = $this;
    }

    private function registerRoutes()
    {
        // Fix for 5.3 (still needed with php5.4 as silex does not support the rebind)
        // used for non controllers as services routes
        $app = $this;

        $this->get('/', function() use ($app) {
            return 'Hello World';
        });
    }
}
