<?php

use Silex\Provider\TwigServiceProvider;
use Silex\Provider\SessionServiceProvider;
use Silex\Provider\DoctrineServiceProvider;
use Silex\Provider\UrlGeneratorServiceProvider;

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

        $this->app['secure.rootController'] = $this->app->share(function() use ($this->app) {
            return new ProjectName\SecureBundle\Controllers\RootController($this->app);
        });
    }

    /**
     * registerRoutes.
     *
     * Register your bundles routes for the controllers.
     */
    protected function registerRoutes()
    {
        /*
         * @route /*
         */
        $app->get('/', 'home.rootController:rootAction');

        /*
         * @route /secure/*
         */

        $secure = $app['controller_factory']->requireHttps();

        $secure->get('/', 'secure.rootController:rootAction');

        $app->mount('/account', $account);
    }

    /**
     * registerConsoles.
     *
     * Register your console commands.
     */
    protected function registerConsoles()
    {
        $console = new Application('Application Console', '0.1');

        return $console;
    }
}
