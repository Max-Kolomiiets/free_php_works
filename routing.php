<?php

if (isset($_GET['action'])) {

    $action = trim($_GET['action']);

    switch($action) {
        case 'cart':
            $currentPage = 'cart';
            break;

        case 'cart-add':
            
            addToCart();
            $currentPage = 'shop';
            break;

        case 'encrease':

            encrease();
            $currentPage = 'cart';
            break;
        case 'decrease':

            decrease();
            $currentPage = 'cart';
            break;
        case 'remove':
            
            remove();
            $currentPage = 'cart';
            break;
        case 'clear':
            clearCart();
            $currentPage = 'cart';
            break;

        case 'checkout': 

            $currentPage = 'check-out';

            break;
    }

}

if (isset($_POST['btn'])) {

    
    // код тут великий, просто не встигав зробити так як треба(
    if (isset($_POST['name'])) {
        $name = userInput($_POST['name']);
        if (strlen($name) >= MIN_LENTH_NAME) {
            $userData['name'] = $name;
            $purchasesInfo['client']['name'] = $userData['name'];
            $userErrors['name'] = ' ';
        }
        else {
            $userErrors['name'] = 'Name should be great than ' . MIN_LENTH_NAME . ' characters';
        }
    }

    if (isset($_POST['surname'])) {
        $surname = userInput($_POST['surname']);
        if (strlen($surname) >= MIN_LENTH_SURNAME) {
            $userData['surname'] = $surname;
            $purchasesInfo['client']['surname'] = $userData['surname'];
            $userErrors['surname'] = ' ';
        }
        else {
            $userErrors['surname'] = 'Surname should be great than ' . MIN_LENTH_SURNAME . ' characters';
        }
    }

    if (isset($_POST['card'])) {
        $card = userInput($_POST['card']);
        if (strlen($card) >= LENTH_CARD) {
            $userData['card'] = $card;
            $purchasesInfo['client']['card'] = $userData['card'];
            $userErrors['card'] = ' ';
        }
        else {
            $userErrors['card'] = 'Card should be ' . LENTH_CARD . 'characters!';
        }
    }


    if (isset($userData['name']) && isset($userData['surname']) && isset($userData['card'])) {

        if (isset($products) && count($_SESSION['cart']['products'] > 0)) {

            foreach($_SESSION['cart']['products'] as $id => $count) {

                $purchasesInfo['products'][]['name'] = $products[$id]->name;
                $purchasesInfo['products'][]['manufacturer'] = $products[$id]->manufacturer;
                $purchasesInfo['products'][]['price'] = $products[$id]->price;
                $purchasesInfo['products'][]['count'] = $count;

            }
        }

        //
        // writing to file ...
        //
        if (writeToFile($purchasesInfo)) {

            clearCart();
            $currentPage = 'checkout-report';

        } else {

            $currentPage = 'checkuot-error';
        }

    } 
    else {

        $currentPage = 'check-out'; 
    }
    

}