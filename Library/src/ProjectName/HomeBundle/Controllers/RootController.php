<?php

namespace ProjectName\HomeBundle\Controllers;

use Base\Application;

class RootController
{
    public function __construct(Application $app)
    {

    }

    public function rootAction()
    {
        return 'Hello World';
    }
}

