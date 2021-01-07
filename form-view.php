<?php // This files is mostly containing things for your view / html ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css"
          rel="stylesheet"/>
          <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <title>Your fancy store</title>
</head>
<body>
    <div class="container jumbotron">
        <h1 class="text-center text-muted "  >Order food in restaurant <i class="fas fa-glass-cheers"></i> <br /> "The YOLO - Cocktail & Sushi Bar"</h1>
        <nav class="mb-3 mt-3 ">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link active bg-info text-white" href="?food=1">Order Food</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-info" href="?food=0">Order Drunk</a>
                </li>
            </ul>
        </nav>
    <form method="post">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="email">E-mail:</label>
                <input type="text" id="email" name="email" class="form-control"/>
                <?php echo "<p class='text-danger'>$errEmail</p>";?>
            </div>
            <div></div>
        </div>

        <fieldset>
            <legend>Address</legend>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="street">Street:</label>
                    <input type="text" name="street" id="street" class="form-control">
                    <?php echo "<p class='text-danger'>$errStreet</p>";?>
                </div>
                <div class="form-group col-md-6">
                    <label for="streetnumber">Street number:</label>
                    <input type="text" id="streetnumber" name="streetnumber" class="form-control">
                    <?php echo "<p class='text-danger'>$errSnumber</p>";?>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="city">City:</label>
                    <input type="text" id="city" name="city" class="form-control">
                    <?php echo "<p class='text-danger'>$errCity</p>";?>
                </div>
                <div class="form-group col-md-6">
                    <label for="zipcode">Zipcode</label>
                    <input type="text" id="zipcode" name="zipcode" class="form-control">
                    <?php echo "<p class='text-danger'>$errZipcode</p>";?>
                </div>
            </div>
        </fieldset>

        <fieldset>
            <legend>Products</legend>
            <?php foreach ($products as $i => $product): ?>
                <label>
					<?php // <?p= is equal to <?php echo ?>
                    <input type="checkbox" value="1" name="products[<?php echo $i ?>]"/> <?php echo $product['name'] ?> -
                    &euro; <?= number_format($product['price'], 2) ?></label><br />
            <?php endforeach; ?>
        </fieldset>

        <button type="submit" class="btn btn-info">Order!</button>
    </form>
    <footer>You already ordered <strong>&euro; <?php echo $totalValue ?></strong> in food and drinks.</footer>
    <?php
    echo "<h3>Your Input :</h3>";
    echo $email;
    echo "<br>";
    echo $street;
    echo "<br>";
    echo $streetnumber;
    echo "<br>";
    echo $zipcode;
    echo "<br>";
    $productChosen = array_keys($_POST["products"]);
    foreach($productChosen as $food){
    echo "Your Order :"." "."<br>".($products[$food]["name"]) ;
   };
   ?>
</div>
<style>
    footer {
        text-align: center;
    }
</style>
</body>
</html>