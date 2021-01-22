<?php
    define('PAGES_PATH','/view/pages/');

    define('MIN_LENTH_NAME', 3);
    define('MIN_LENTH_SURNAME', 2);
    define('LENTH_CARD', 16);
   

    $defPage = 'shop';
    $currentPage = $defPage;

    $countProd = 0;

    $userData = [];
    $userErrors = [];

    $purchasesInfo = [];