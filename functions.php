<?php

function clearCart() {
    if (isset($_SESSION['cart']['products'])) {

        $cart = $_SESSION['cart']['products'];
        foreach($cart as $key => $val) {
            unset($_SESSION['cart']['products'][$key]);
        }
        
    }
}

function addToCart() {
    $productId = (int)$_GET['id'];

    $ids = array_keys($_SESSION['cart']['products']);
    if (in_array($productId, $ids)) {

        $_SESSION['cart']['products'][$productId]++;
        
    } else {

        $_SESSION['cart']['products'][$productId] = 1;
    }

    
}

function encrease() {
    $id = (int)$_GET['id'];

    $ids = array_keys($_SESSION['cart']['products']);
    if (in_array($id, $ids) && $_SESSION['cart']['products'][$id] > 0) {

        $_SESSION['cart']['products'][$id]++;
        
    } 

   
}

function decrease() {
    $id = (int)$_GET['id'];

    $ids = array_keys($_SESSION['cart']['products']);
    if (in_array($id, $ids) && $_SESSION['cart']['products'][$id] > 1) {

        $_SESSION['cart']['products'][$id]--;
        
    } else {
        unset($_SESSION['cart']['products'][$id]);
    }

    
}

function remove() {
    $id = (int)$_GET['id'];

    $ids = array_keys($_SESSION['cart']['products']);
    if (in_array($id, $ids)) {

        unset($_SESSION['cart']['products'][$id]);
        
    } 
   
}

//__ checking user input 
function userInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  function writeToFile(array $data, string $path = __DIR__ . '/storage/clientsData.json') {

    if (file_exists($path)) {

        $file = file_get_contents($path, true);
        $prevData = json_decode($file, true);
        unset($file);
        array_push($prevData, $data);

        if(file_put_contents($path, json_encode($prevData))) {
            return true;
        } else return false;

    } else {

        if(file_put_contents($path, json_encode($data))) {
            return true;
        } else return false;

    }
    
    
    

  }