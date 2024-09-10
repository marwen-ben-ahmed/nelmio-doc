<?php

use App\Kernel;

require_once dirname(__DIR__).'/vendor/autoload_runtime.php';

if (isset($_SERVER['APP_ENV']) && $_SERVER['APP_ENV'] === 'dev') {
    umask(0000);
    $kernel = new \App\Kernel($_SERVER['APP_ENV'], (bool) $_SERVER['APP_DEBUG']);
    $request = \Symfony\Component\HttpFoundation\Request::createFromGlobals();
    $response = $kernel->handle($request);
    $response->send();
    $kernel->terminate($request, $response);
}


return function (array $context) {
    return new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};
