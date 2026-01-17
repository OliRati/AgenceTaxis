<?php
session_start();

// --- CSRF token: generate if missing ---
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Find the root of the project
function findProjectRoot($startDir = __DIR__)
{
    $dir = $startDir;

    while ($dir !== dirname($dir)) {
        if (file_exists($dir . '/env_example.php')) {
            return realpath($dir);
        }
        $dir = dirname($dir);
    }

    return null;
}

// Get project configuration file
$PROJECT_ROOT = findProjectRoot(__DIR__);

if (file_exists($PROJECT_ROOT . '/env.php'))
    require $PROJECT_ROOT . '/env.php';
else
    require $PROJECT_ROOT . '/env_example.php';

require PHP_ROOT . '/fonctions.php';
require PHP_ROOT . '/connexiondb.php';
