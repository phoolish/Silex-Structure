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
        
        $this->configureApplication();
        $this->registerModels();
        $this->registerControllers();
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
