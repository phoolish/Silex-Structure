<?php

namespace Base;

use Silex\Application as BaseApplication;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\SessionServiceProvider;
use Silex\Provider\DoctrineServiceProvider;
use Silex\Provider\UrlGeneratorServiceProvider;

use Symfony\Component\Console\Application as ConsoleApplication;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use Symfony\Component\HttpFoundation\Session\Storage\Handler\PdoSessionHandler;

use Codeject\HomeBundle\Controllers\RootController as HomeBundleRootController;

class Application extends BaseApplication
{
    public function __construct()
    {
        parent::__construct();

        $app = $this;

        $app['resolver'] = $app->share(function () use ($app) {
            return new ControllerResolver($app, $app['logger']);
        });

        $this->configureApplication();
        $this->configureControllers();
    }

    public function runConsole()
    {
        $console = $this->configureConsole();
        $console->run();
    }

    protected function configureApplication()
    {
        $app = $this;

        $app['debug'] = true;

        $app->register(new SessionServiceProvider());
        $app->register(new TwigServiceProvider());
        $app->register(new UrlGeneratorServiceProvider());

        $app->register(new DoctrineServiceProvider(), array(
            'db.options' => array(
                'driver'   => 'pdo_mysql',
                'dbname'   => '',
                'host'     => '127.0.0.1',
                'user'     => '',
                'password' => '',
            ),
        ));
    }

    protected function configureControllers()
    {
        $app = $this;
        
        $app['home.rootController'] = $app->share(function() use ($app) {
            return new HomeBundleRootController($app);
        });

        // /* Routes
        $app->get('/', 'home.rootController:rootAction');

        // /Secure/* Routes
        //$secure = $app['controller_factory']->requireHttps();

       // $secure->get('/', 'secure.rootController:rootAction');
        //$app->mount('/account', $account);

    }

    protected function configureConsole()
    {
        $console = new Application('Application Console', '0.1');

        return $console;
    }
}