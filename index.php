<?php
/*function whatIsHappening//() {
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);


}*/

//whatIsHappening(); 
session_start();

$emailErr = $streetErr = $numberErr = $cityErr = $zipcodeErr = $productErr = "";
$email = $street = $streetnumber = $city = $zipcode = $product = "";
$result="";
$text="Delivery To : ";
$order_text="Your order is :";

if (isset($_POST["order"])) {

    //email
    if (empty($_POST["email"])) {
        $emailErr = "Email is Required";
    }
    else {
        $email = $_POST["email"];
        $_SESSION["email"] = $_POST["email"];
        
    }


    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
      }


    //street

    if (empty($_POST["street"])) {
        $streetErr = " Street is Required";
    }
    else {
        $street = $_POST["street"];
        $_SESSION["street"] = $_POST["street"];
        
    }

    //street Number

    if (empty($_POST["streetnumber"]))  {
        $numberErr = "Street number is Required";

    }
    
    else {
        $streetnumber = $_POST["streetnumber"];
        $_SESSION["streetnumber"] = $_POST["streetnumber"];
        
    
    } 

    //city
    if (empty($_POST["city"])) {
        $cityErr = "city is Required";

    }
    else {
        $city = $_POST["city"];
        $_SESSION["city"] = $_POST["city"];
        

    }

    //Zipcode
    if (empty($_POST["zipcode"])){
        $zipcodeErr = "Only number Required";
        } else {
          if (!preg_match("/^[1-9][0-9]*$/",$_POST["zipcode"])) {
              $zipcodeErr = "Only number Required";
          } else {
             $zipcode = $_POST["zipcode"];
             $_SESSION["zipcode"] = $_POST["zipcode"];
        
        }
       
    }

    //product

    if (empty($_POST["products"])) {
        $productErr = "Please Choose your Product ";
    }
    else {
        $products = $_POST["products"];
        $_SESSION["products"] = $_POST["products"];
         
    }

    //showing error and approved Message 

    if (!empty($_POST["email"]) && !empty($_POST["street"]) && !empty($_POST["streetnumber"]) && !empty($_POST["city"]) && !empty($_POST["zipcode"]) && !empty($_POST["products"])){
        $result = '<div class="alert alert-success" role="alert">Thank you! Your order is submitted ! </div>';
    } else {
        $result = '<div class="alert alert-danger" role="alert"> ERORR ! Please fill in Form Order</div>';
    }
    

}


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  
  //TODO :is still not working if we click the nav option our input in gone 
  // option for product
  
  if (isset($_GET["drinks"])== 1) {
    $products = [
        ['name' => 'Wiskey Sour', 'price' => 10,'image' => 'https://image.freepik.com/free-photo/blue-lagoon-ina-glass-with-frozen-steam_114579-2193.jpg'],
        ['name' => ' Margarita', 'price' =>9.5,'image' => 'https://image.freepik.com/free-photo/red-cocktail-with-peeled-orange-skin-minced-ice-cubes_114579-3394.jpg'],
        ['name' => 'Moscow Mule', 'price' => 9,'image' => 'https://image.freepik.com/free-photo/lemon-cocktail-with-green-table_140725-4787.jpg'],
        ['name' => 'whipped vodka ', 'price' => 9,'image' => 'https://image.freepik.com/free-photo/cocktail-with-lemon-slices-ice-cubes-mint_141793-581.jpg'],
        ['name' => 'Iced raspberry tea with orange and lemon', 'price' => 6,'image' => 'https://image.freepik.com/free-photo/cup-raspberry-tea-with-orange-lemon_105609-657.jpg'],
        ['name' => 'Iced lemon tea', 'price' => 5,'image' => 'https://image.freepik.com/free-photo/delicious-iced-tea_144627-27218.jpg'],
        ['name' => 'Cold fruit lemonade Mocktail', 'price' => 6,'image' => 'https://image.freepik.com/free-photo/cold-fruit-lemonade-mason-jar-isolated-black_105609-14.jpg'],
        ['name' => ' Iced apple tea with cranberry and cinnamon ', 'price' => 6,'image' => 'https://image.freepik.com/free-photo/cup-apple-tea-with-cranberry-cinnamon-isolated-black_105609-661.jpg'],
    ];
   
 }else if(($_GET["food"])== 0){ 
    $products = [
        ['name' => 'Sushi set with tuna salmon ', 'price' => 8,'image' => 'https://image.freepik.com/free-photo/slices-fresh-salmon-with-radish-soy-sauce_219795-158.jpg'],
        ['name' => ' Sake Nigiri', 'price' => 9,'image' => 'https://image.freepik.com/free-photo/sushi-roll-philadelphia-with-salmon-avocado-cream-cheese-sushi-menu-japanese-food-top-view_89816-11548.jpg'],
        ['name' => 'Japanese Dumpling ', 'price' => 8,'image' => 'https://image.freepik.com/free-photo/high-angle-japanese-dumplings-composition_23-2148809867.jpg'],
        ['name' => 'California Roll', 'price' => 25,'image' => 'https://image.freepik.com/free-photo/sushi-set-nigiri-sushi-rolls-served-black-stone-slate_135427-4812.jpg'],
        ['name' => 'Moscow Mule', 'price' => 9,'image' => 'https://image.freepik.com/free-photo/sushi-set-with-cream-sauce_140725-5504.jpg'],
        ['name' => 'Fried shrimps with unagi sauce', 'price' => 9,'image' => 'https://image.freepik.com/free-photo/fried-shrimps-with-unagi-sauce-round-board-close-up-high-quality-photo_275899-591.jpg'],
        ['name' => ' grilled unagi with sauce (kabayaki) ', 'price' => 9,'image' => 'https://image.freepik.com/free-photo/sliced-grilled-eel-grilled-unagi-with-sauce-kabayaki-japanese-food-style_1339-126775.jpg'],
        ['name' => 'Moscow Mule', 'price' => 9,'image' => 'https://image.freepik.com/free-photo/grilled-salmon-sushi-roll-with-sauce-japanese-food-style_1339-128036.jpg'],
        

        ];
   
}


 
$totalValue = 0;
foreach ($_POST['products'] as $i => $value) {
    $totalValue += ($products[$i]['price']);
}

require 'form-view.php';

