<?php

$app->get('/', function() {
    return 'home';
});

$app->get('/about', function() {
    return 'about';
});

$app->get('/contact', function() {
    return 'contact';
});
