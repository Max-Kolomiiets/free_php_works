<?php

    ini_set('display_errors', 'on');
    ini_set('display_startup_errors','on');

    error_reporting(E_ALL);

    session_start();

    require_once __DIR__ . '/products/products.php';
    require_once __DIR__ . '/config.php';
    require_once __DIR__ . '/functions.php';
    require_once __DIR__ . '/routing.php';
    require_once __DIR__ . '/view/master.php';

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [
            'products' => [

            ],
        ];
    }











