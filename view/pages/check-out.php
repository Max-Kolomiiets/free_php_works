
<div class="center align-item">
    <h1>
        Fill your data!
    </h1>
</div>
<hr>

<div class="center">
    <form action="index.php" method="post">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="align-item">
        <span class="error">* <?php if (isset($userErrors['name'])) echo "{$userErrors['name']}"; ?> </span>
        <br>

        <label for="surname">Surname</label>
        <input type="text" name="surname" id="surname" class="align-item">
        <span class="error">* <?php if (isset($userErrors['surname'])) echo "{$userErrors['surname']}"; ?> </span>
        <br>

        <label for="card-number">Card Number</label>
        <input type="text" name="card" id="card-number" class="align-item">
        <span class="error">* <?php if (isset($userErrors['card'])) echo "{$userErrors['card']}"; ?> </span>
        <br>

        <input type="submit" name="btn" value="Submit!" class="confirm">

    </form>
</div>
<hr>

<div class="box-btn btn-container">
    <div id="menu">
        <a  href="index.php?action=shop" class="btn back-to-menu"><h2>Back to Shop!</h2></a>
    </div>

    <div id="cart">
        <a href="index.php?action=cart" class="btn back-to-cart"><h2>Back to cart!</h2></a> 
    </div>
</div>