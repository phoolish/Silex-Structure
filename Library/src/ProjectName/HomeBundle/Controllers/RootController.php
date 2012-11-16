<?php

namespace ProjectName\HomeBundle\Controllers;

use Base\Configuration;

class RootController
{
    public function __construct(Configuration $app)
    {

    }

    public function rootAction()
    {
        return 'Hello World';
    }
}
