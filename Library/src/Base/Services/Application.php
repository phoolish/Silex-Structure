<?php

namespace Base\Services;

use Silex\Application as BaseApplication;

/**
 * Application
 */
class Application extends BaseApplication
{
    /**
     * @var \Silex\Application
     */
    protected $app;

    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->app = $this;

        $this->app['resolver'] = $this->app->share(function () use ($this->app) {
            return new ControllerResolver($this->app, $this->app['logger']);
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
