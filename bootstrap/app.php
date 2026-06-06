<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

$app = Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->trustProxies(at: '*');
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();

// Customize storage path on Vercel
if (isset($_ENV['VERCEL']) || isset($_SERVER['VERCEL']) || env('VERCEL') == '1') {
    $storagePath = '/tmp/storage';
    $app->useStoragePath($storagePath);
    
    $viewsDest = $storagePath . '/framework/views';
    $dirs = [
        $viewsDest,
        $storagePath . '/framework/cache',
        $storagePath . '/framework/sessions',
        $storagePath . '/logs',
    ];
    foreach ($dirs as $dir) {
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }
    }

    // Warm up view cache by copying pre-compiled views from read-only base path to writable /tmp
    $viewsSource = dirname(__DIR__) . '/storage/framework/views';
    if (is_dir($viewsSource)) {
        foreach (glob($viewsSource . '/*.php') as $viewFile) {
            $destFile = $viewsDest . '/' . basename($viewFile);
            if (!file_exists($destFile)) {
                copy($viewFile, $destFile);
            }
        }
    }
}

return $app;
