<?php

// Use this function when you need to need an overview of these variables
function whatIsHappening() {
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);


}

whatIsHappening();

// We are going to use session variables so we need to enable sessions
session_start();


$emailErr = $streetErr = $numberErr = $cityErr = $zipcodeErr = $productErr = "";
$email = $street = $streetnumber = $city = $zipcode = $product = "";
$_SESSION["street"] = $_SESSION["streetnumber"] = $_SESSION["city"] = "";
$result="";
$text="Your Input : ";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //email
    if (empty($_POST["email"])) {
        $emailErr = "Email is Required";
    }
    else {
        $email = $_POST["email"];
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
    }

    //street Number

    if (empty($_POST["streetnumber"]))  {
        $numberErr = "Street number is Required";

    }
    
    else {
        $streetnumber = $_POST["streetnumber"];
    
    } 

    //city
    if (empty($_POST["city"])) {
        $cityErr = "city is Required";

    }
    else {
        $city = $_POST["city"];

    }

    //Zipcode
    
    if (empty($_POST["zipcode"])) {
        $zipcodeErr = "Email is Required";
    }
    else {
        $zipcode = $_POST["zipcode"];

    }

    if (!preg_match("/^[1-9][0-9]*$/", $zipcode)) {
        $zipcodeErr = "Only numbers allowed";
    }

    //product

    if (empty($_POST["products"])) {
        $productErr = "Please Choose your Product ";
    }
    else {
        $products = $_POST["products"];
    }
      
    //showing error and approved Message 

    if (!empty($_POST["email"]) && !empty($_POST["street"]) && !empty($_POST["streetnumber"]) && !empty($_POST["city"]) && !empty($_POST["zipcode"]) && !empty($_POST["products"])){
        $result = '<div class="alert alert-success" role="alert">Thank you! Your order is submitted.! </div>';
    } else {
        $result = '<div class="alert alert-danger" role="alert">Please fill in Form Order</div>';
    }
    

}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $products = [
    ['name' => 'Sushi set with tuna salmon ', 'price' => 8,'image' => 'https://image.freepik.com/free-photo/sushi-set-with-tuna-salmon-vegetables-ginger-wasabi-side-view_141793-15530.jpg'],
    ['name' => ' Sake Nigiri', 'price' => 9,'image' => 'https://image.freepik.com/free-photo/sushi-roll-philadelphia-with-salmon-avocado-cream-cheese-sushi-menu-japanese-food-top-view_89816-11548.jpg'],
    ['name' => 'Japanese Dumpling ', 'price' => 8,'image' => 'https://image.freepik.com/free-photo/high-angle-japanese-dumplings-composition_23-2148809867.jpg'],
    ['name' => 'California Roll', 'price' => 25,'image' => 'https://image.freepik.com/free-photo/sushi-set-nigiri-sushi-rolls-served-black-stone-slate_135427-4812.jpg'],
    ['name' => 'Wiskey Sour', 'price' => 10,'image' => 'https://image.freepik.com/free-photo/blue-lagoon-ina-glass-with-frozen-steam_114579-2193.jpg'],
    ['name' => ' Margarita', 'price' =>9.5,'image' => 'https://image.freepik.com/free-photo/red-cocktail-with-peeled-orange-skin-minced-ice-cubes_114579-3394.jpg'],
    ['name' => 'Moscow Mule', 'price' => 9,'image' => 'https://image.freepik.com/free-photo/lemon-cocktail-with-green-table_140725-4787.jpg'],
    ['name' => 'whipped vodka ', 'price' => 9,'image' => 'https://image.freepik.com/free-photo/cocktail-with-lemon-slices-ice-cubes-mint_141793-581.jpg'],
   
];
 
 
$totalValue = 0;
foreach ($_POST['products'] as $i => $product) {
    $totalValue += ($products[$i]['price']);
}

require 'form-view.php';

