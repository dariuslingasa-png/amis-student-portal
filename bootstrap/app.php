<?php

// Parse Heroku ClearDB URL for database connection
if (getenv('CLEARDB_DATABASE_URL')) {
    $url = parse_url(getenv('CLEARDB_DATABASE_URL'));
    
    putenv('DB_CONNECTION=mysql');
    putenv('DB_HOST=' . $url['host']);
    putenv('DB_PORT=' . ($url['port'] ?? 3306));
    putenv('DB_DATABASE=' . substr($url['path'], 1));
    putenv('DB_USERNAME=' . $url['user']);
    putenv('DB_PASSWORD=' . $url['pass']);
}

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
