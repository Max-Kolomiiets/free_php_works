<?php 
    $countProd = count($_SESSION['cart']['products']);
    $totalSum = 0;

    if( $countProd > 0) {
        $tmp = 0;
        foreach($_SESSION['cart']['products'] as $id => $count) {
            $totalSum += $products[$id]->price*$count;
            $tmp += $count;
        }
        $countProd = $tmp;
    }
?>

<div class="welcome"><h1>Your Cart:</h1></div>
<?php if ($countProd > 0): ?>

    <div class="count-prod">
        <p ><h3 style="background-color:lightseagreen ;">Count products: <?= $countProd ?></h3> </p>
    </div>

    <?php if (count($_SESSION['cart']['products']) > 0 && isset($products)): ?>
        <div class="box">
            <?php foreach($_SESSION['cart']['products'] as $id => $count): ?>

                <div class="item-product">
                    <div class="item">
                        <img src="<?= $products[$id]->img ?>" width="200" height="150" alt="laptop"><br>  
                        Name:             
                        <?= $products[$id]->name ?><br>
                        Manufacturer: 
                        <?= $products[$id]->manufacturer ?><br>
                        Price: 
                        <?= $products[$id]->price ?> $<br>
                        Total: 
                        <?= $products[$id]->price*$count ?> $<br>
                        <p>
                            Count: <?=$count?>
                        </p>
                        <div class="box-btn">
                            <a href="index.php?action=decrease&id=<?=$id?>" class="btn"> - </a>
                            <a href="index.php?action=encrease&id=<?=$id?>" class="btn"> + </a>
                        </div>
                        <div class="box-btn-remove">
                            <a href="index.php?action=remove&id=<?=$id?>" class="btn btn-remove">Remove</a>
                        </div>
                    </div>
                </div>

            <?php endforeach ?>
        </div>
        
        <div class ="btn-container" id="clear-cart">
            <a href="index.php?action=clear" class="btn btn-remove"><h4>Clear the cart!</h4></a>
        </div>

        <div class="total-sum">
            <span>
                <h3>The total cost: <?= $totalSum ?> $</h3>
            </span>
            </div>

        <div  class="btn-container box-btn">
            
            <div id="menu">
                <a  href="index.php?action=shop" class="btn back-to-menu"><h2>Back to Shop!</h2></a>
            </div>

            <div class="checkout">
                <a href="index.php?action=checkout" class="btn check-out"><h2>Checkout!</h2></a> 
            </div>
        </div>

    <?php endif?>
<?php else: ?>
    <div class="cart-empty">
        Oops, the cart is empty!
    </div>
    <div id="menu" class="center">
        <a  href="index.php?action=shop" class="btn back-to-menu"><h2>Back to Shop!</h2></a>
    </div>
<?php endif ?>










