<?php

namespace Base;

use Base\Services\Application;

use Silex\Provider\TwigServiceProvider;
use Silex\Provider\SessionServiceProvider;
use Silex\Provider\DoctrineServiceProvider;
use Silex\Provider\UrlGeneratorServiceProvider;

use Symfony\Component\Console\Application as ConsoleApplication;

class Configuration extends Application
{
    /**
     * configureApplication.
     *
     * Configuration for the Application like registering
     * ServiceProviders and Application Middlewares.
     */
    protected function configureApplication()
    {
        $this->app['debug'] = true;

        $this->app->register(new SessionServiceProvider());
        $this->app->register(new TwigServiceProvider());
        $this->app->register(new UrlGeneratorServiceProvider());

        $this->app->register(new DoctrineServiceProvider(), array(
            'db.options' => array(
                'driver'   => 'pdo_mysql',
                'dbname'   => '',
                'host'     => '127.0.0.1',
                'user'     => '',
                'password' => '',
            ),
        ));
    }

    /**
     * registerControllers.
     *
     * Register your bundles controllers as a service.
     */
    protected function registerControllers()
    {
        $this->app['home.rootController'] = $this->app->share(function() use ($this->app) {
            return new ProjectName\HomeBundle\Controllers\RootController($this->app);
        });
    }

    /**
     * registerModels.
     *
     * Register your bundles Models.
     */
    protected function registerModels()
    {
        $this->app['home.rootModel'] = $this->app->share(function() use ($this->app) {
            return new ProjectName\HomeBundle\Models\RootModel;
        });
    }

    /**
     * registerRoutes.
     *
     * Register your bundles routes for the controllers.
     */
    protected function registerRoutes()
    {
        $this->app->get('/', 'home.rootController:rootAction');
    }

    /**
     * registerConsoles.
     *
     * Register your console commands.
     */
    protected function registerConsoles()
    {
        $console = new ConsoleApplication('Application Console', '0.1');

        $console->add(new ProjectName\HomeBundle\Controllers\ConsoleController);

        return $console;
    }
}
