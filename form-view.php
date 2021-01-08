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
          
          <link rel="stylesheet" href="style.css">    
<title>Sushi&Cocktail Bar</TH></title>
</head>
<body>
   <div class="container">
    <div class="container jumbotron" >
        <h1 class="text-center text-danger ">Order food In Our Cafe <i class="fas fa-glass-cheers"></i> <br /> "The YOLO - Sushi & Cocktail Bar"</h1>
        <nav class="mb-3 mt-3 ">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link active bg-warning text-white" href="?food=1">Order Food</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="?food=0">Order Drink</a>
                </li>
            </ul>
        </nav>
        <form method="POST">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="email">E-mail:</label>
                <input type="text" id="email" name="email" class="form-control"/>
                <span class="error text-danger">* <?php echo $emailErr; ?></span>
            </div>
            <div></div>
        </div>

        <fieldset>
            <legend>Address</legend>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="street">Street:</label>
                    <input type="text" name="street" id="street" class="form-control 
                    ">
                    <span class="error text-danger">* <?php echo $streetErr; ?></span>
                </div>
                <div class="form-group col-md-6">
                    <label for="streetnumber">Street number:</label>
                    <input type="text" id="streetnumber" name="streetnumber" class="form-control">
                    <span class="error text-danger">* <?php echo $numberErr; ?></span>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="city">City:</label>
                    <input type="text" id="city" name="city" class="form-control">
                    <span class="error text-danger">* <?php echo $cityErr; ?></span>
                </div>
                <div class="form-group col-md-6">
                    <label for="zipcode">Zipcode</label>
                    <input type="text" id="zipcode" name="zipcode" class="form-control">
                    <span class="error text-danger">* <?php echo $zipcodeErr ;?></span>
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

        <button type="submit" class="btn btn-warning">Order!</button>
    </form>
    <div class="text">
    <footer>Your Total Order <strong>&euro; <?php echo $totalValue ?></strong></footer>
    <?php
    echo "<h3>Your Input  :</h3>";
    echo $email;
    echo "<br>";
    echo $street;
    echo "<br>";
    echo $streetnumber;
    echo "<br>";
    echo $zipcode;
    echo "<br>";
    echo "<h4 style='color:red'>".$productsErr."</h4>";
    $productChosen = array_keys($_POST["products"]);
    foreach($productChosen as $food){
    echo "<br>" ($products[$food]["name"]) ;
    
   };
   ?>
   </div>
</div>
</div> 
<style>
    footer {
        text-align: center;
    }
</style>
</body>
</html>