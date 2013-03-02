<?php

namespace Project\Resources;

use Silex\Application as BaseApplication;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\UrlGeneratorServiceProvider;

class Application extends BaseApplication
{
    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->registerParameters()
             ->registerServiceProviders()
             ->registerControllers()
             ->registerModels()
             ->registerRoutes();
    }

    /**
     * Register parameters
     *
     * @return Application
     */
    private function registerParameters()
    {
        $this['debug'] = true;

        return $this;
    }

    /**
     * Register silex service providers
     *
     * @return Application
     */
    private function registerServiceProviders()
    {
        $this->register(new ServiceControllerServiceProvider());
        $this->register(new UrlGeneratorServiceProvider());

        return $this;
    }

    /**
     * Register controller classes to the Silex/Pimple DIC when using
     * ServiceControllerServiceProvider
     *
     * @return Application
     */
    private function registerControllers()
    {
        // Fix for 5.3 (still needed with php5.4 as silex does not support the rebind)
        $app = $this;

        return $this;
    }

    /**
     * Register model classes to the Silex/Pimple DIC
     *
     * @return Application
     */
    private function registerModels()
    {
        // Fix for 5.3 (still needed with php5.4 as silex does not support the rebind)
        $app = $this;

        return $this;
    }

    /**
     * Register silex routes
     *
     * @return Application
     */
    private function registerRoutes()
    {
        // Fix for 5.3 (still needed with php5.4 as silex does not support the rebind)
        // used for non controllers as services routes
        $app = $this;

        $this->get('/', function() use ($app) {
            return 'Hello World';
        });

        return $this;
    }
}
