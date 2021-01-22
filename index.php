<?php
    require_once __DIR__ . '/bootstrap.php';
    require_once __DIR__ . '/config.php';

    $defPage = 'shop';
    $currentPage = $defPage;

    $countProd = 0;

    if (isset($_GET['action'])) {

        $action = trim($_GET['action']);

        switch($action) {
            case 'cart':
                $currentPage = 'cart';
                break;

            case 'cart-add':
                $productId = (int)$_GET['id'];
    
                $ids = array_keys($_SESSION['cart']['products']);
                if (in_array($productId, $ids)) {

                    $_SESSION['cart']['products'][$productId]++;
                    
                } else {

                    $_SESSION['cart']['products'][$productId] = 1;
                }
    
                $currentPage = 'shop';
                break;

            case 'encrease':
                $id = (int)$_GET['id'];

                $ids = array_keys($_SESSION['cart']['products']);
                if (in_array($id, $ids) && $_SESSION['cart']['products'][$id] > 0) {

                    $_SESSION['cart']['products'][$id]++;
                    
                } 

                $currentPage = 'cart';
                break;
            case 'decrease':
                $id = (int)$_GET['id'];

                $ids = array_keys($_SESSION['cart']['products']);
                if (in_array($id, $ids) && $_SESSION['cart']['products'][$id] > 1) {

                    $_SESSION['cart']['products'][$id]--;
                    
                } else {
                    unset($_SESSION['cart']['products'][$id]);
                }

                $currentPage = 'cart';
                break;
            case 'remove':
                $id = (int)$_GET['id'];

                $ids = array_keys($_SESSION['cart']['products']);
                if (in_array($id, $ids)) {

                    unset($_SESSION['cart']['products'][$id]);
                    
                } 
                $currentPage = 'cart';
                break;
            case 'clear':
                if (isset($_SESSION['cart']['products'])) {

                    $cart = $_SESSION['cart']['products'];
                    foreach($cart as $key => $val) {
                        unset($_SESSION['cart']['products'][$key]);
                    }
                    $currentPage = 'cart';
                }
                
                break;
        }

    }



    require_once __DIR__ . '/view/master.php';