<?php 
    $countProd = count($_SESSION['cart']['products']);

    if( $countProd > 0) {
        $tmp = 0;
        foreach($_SESSION['cart']['products'] as $id => $count) {
            $tmp += $count;
        }
        $countProd = $tmp;
    }
?>

    <div class="welcome"><h1>Welcome to Shop!</h1></div>
    <div class="cart">
        <a href="index.php?action=cart" style="color: palevioletred;"><h2>Your Cart (<?= $countProd ?>)</h2></a>
    </div>

    <div class="box">
        <?php foreach($products as $key => $value): ?>
            <div class="item-product">
                <div class="item">
                    <img src="<?= $value->img ?>" width="200" height="150" alt="laptop"><br>
                    Name: 
                    <?= $value->name ?><br>
                    Manufacturer: 
                    <?= $value->manufacturer ?><br>
                    Price:
                    <?= $value->price ?> $<br>
                    <div class="btn-container">
                        <a href="index.php?action=cart-add&id=<?=$key?>" class="btn">Add to Cart</a>
                    </div>

                </div>
            </div>
        <?php endforeach ?>
    </div>

