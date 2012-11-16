<?php

namespace Base\Services;

use Silex\Application as BaseApplication;

/**
 * Application
 */
class Application extends BaseApplication
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $app = $this;

        $app['resolver'] = $app->share(function () use ($app) {
            return new ControllerResolver($app, $app['logger']);
        });

        $this->configureApplication();
        $this->registerControllers();
        $this->registerModels();
        $this->registerRoutes();
        $this->registerConsoles();
    }

    /**
     * runConsole.
     */
    public function runConsole()
    {
        $console = $this->configureConsole();
        $console->run();
    }
}
