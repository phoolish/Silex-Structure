<?php

$account = $app['controllers_factory']->requireHttps();

$account->get('/', function() {
    return 'account';
});
