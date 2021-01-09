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
          <link rel="preconnect" href="https://fonts.gstatic.com">
          <link rel="preconnect" href="https://fonts.gstatic.com">
          <link href="https://fonts.googleapis.com/css2?family=Cabin+Sketch:wght@700&display=swap" rel="stylesheet">

          <link rel="stylesheet" href="style.css">    
<title>Sushi&Cocktail Bar</TH></title>
</head>
<body>
   <div class="container">
    <div class="container jumbotron" >
        <h1 class="text-center text-danger ">Order food In Our Cafe <br /> "The YOLO - Sushi & Cocktail Bar"</h1>
        <div class="warning">
            <?php echo $result; ?> 
        </div>
        <nav class="mb-3 mt-3 ">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link active bg-warning text-white" href="?food=1">Form Order</a>
                </li>
            </ul>
        </nav>
        <form method="POST">
        <div class="form-row" >
            <div class="form-group col-md-6">
                <label for="email">E-mail:</label>
                <input type="text" id="email" name="email" class="form-control" value="<?php echo $email;?>">
                <span class="error text-danger">* <?php echo $emailErr; ?></span>
            </div>
            <div></div>
        </div>

        <fieldset>
            <legend>Address</legend>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="street">Street:</label>
                    <input type="text" name="street" id="street" class="form-control " value="<?php echo $street;?>">
                    <span class="error text-danger">*<?php echo $streetErr; ?></span>
                </div>
                <div class="form-group col-md-6">
                    <label for="streetnumber">Street number:</label>
                    <input type="text" id="streetnumber" name="streetnumber" class="form-control"   value="<?php echo $streetnumber;?>">
                    <span class="error text-danger">* <?php echo $numberErr; ?></span>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="city">City:</label>
                    <input type="text" id="city" name="city" class="form-control"  value="<?php echo $city;?>">
                    <span class="error text-danger">* <?php echo $cityErr; ?></span>
                </div>
                <div class="form-group col-md-6">
                    <label for="zipcode">Zipcode</label>
                    <input type="text" id="zipcode" name="zipcode" class="form-control" value="<?php echo $zipcode;?>">
                    <span class="error text-danger">* <?php echo $zipcodeErr ;?></span>
                </div>
            </div>
        </fieldset>

        <fieldset>
            <legend>Products</legend>
            <span class="error text-danger">* <?php echo $productErr ;?></span>
            <div class="col-md-13">
                    <div class="row g-3">
                    <?php foreach ($products as $i => $product): ?>
                
                    <div class=" image col-md-3">
                        <img src="<?php echo $product['image'] ?>" width="150" width="240">
                <label>
                    <?php // <?p= is equal to <?php echo ?>
                    <input type="checkbox" value="1" name="products[<?php echo $i ?>]"/> <?php echo $product['name'] ?>
                    &euro; <?= number_format($product['price'], 2) ?></label><br />
                    </div>
            <?php endforeach; ?>
        </div>
        </div>
        </fieldset>

        <button type="submit" name="order-now" class="btn btn-warning">Order!</button>
    </form>
    <div class="text">
    <footer>Your Total Order <strong>&euro; <?php echo $totalValue ?></strong></footer>
   </div>

   
   <div class ="text">
   <?php
          $productChosen = array_keys($_POST["products"]);
          foreach($productChosen as $food){
          echo ($products[$food]["name"])."<br />" ;
          

    }
    echo "<br>";
    echo $text."<br />";
    echo $email."<br>";
    echo $street." ";
    echo $streetnumber." ";
    echo $city." ";
    echo $zipcode." "; 
   
        
    ?>
   
</div>
</div> 
<style>
    footer {
        text-align: center;
    }
</style>
</body>
</html>