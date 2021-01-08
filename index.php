<?php
declare(strict_types=1);
declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');


// We are going to use session variables so we need to enable sessions
session_start();





// define variables and initialize with empty values
$emailErr = $streetrErr = $numberErr = $cityErr = $ZipcodeErr = $productErr = "";
$email = $street = $streetnumber = $city = $zipcode = $product = "";
$_SESSION["street"] = $_SESSION["streetnumber"] = $_SESSION["city"] = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["email"])) {
        $emailErr = "Email is Required";
    }
    else {
        $email = $_POST["email"];
    }

    if (empty($_POST["street"])) {
        $streetErr = " Street is Required";
    }
    else {
        $street = $_POST["street"];
    }

    if (empty($_POST["streetnumber"]))  {
        $numberErr = "Street number is Required";

    }
    
    else {
        $streetnumber = $_POST["streetnumber"];
    
    } 
    if (empty($_POST["city"])) {
        $cityErr = "city is Required";

    }
    else {
        $city = $_POST["city"];

    }
    
    if (empty($_POST["zipcode"])) {
        $zipcodeErr = "Email is Required";
    }
    else {
        $zipcode = $_POST["zipcode"];

    }
    if (!preg_match("/^[1-9][0-9]*$/", $zipcode)) {
        $zipcodeErr = "Only numbers allowed";
    }

    if (empty($_POST["products"])) {
        $productsErr = "You didnt choose your order .";
    }
    else {
        $products = $_POST["products"];
 
    }
    if (!empty($_POST["email"]) && !empty($_POST["street"]) && !empty($_POST["streetnumber"]) && !empty($_POST["city"]) && !empty($_POST["zipcode"])) {
        $result = '<div class="alert alert-success" role="alert">Your order is submitted, Thank You</div>';
    } else {
        $result = '<div class="alert alert-danger" role="alert">Please fill in Form Order</div>';
    }
    if(isset($_POST["order-now"])){
        
        $_SESSION["street"] = $_POST["street"] ;
        $_SESSION["streetnumber"] = $_POST["streetnumber"];
        $_SESSION["city"] = $_POST["city"];
}
}




function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $products = [
    ['name' => 'Salmon Roll', 'price' => 8,'image' => 'https://i.imgur.com/rwEV7ZP.jpg'],
    ['name' => 'Negitoru Sushi', 'price' => 9,'image' => 'https://i.imgur.com/A6LV0rF.jpg'],
    ['name' => 'Salmon Roll', 'price' => 8,'image' => 'https://i.imgur.com/VwNZ6JE.jpeg'],
    ['name' => 'Variaty Sushi', 'price' => 25,'image' => 'https://i.imgur.com/QwEq1g2.jpg'],
    ['name' => 'Wisket Sour', 'price' => 10,'image' => 'https://i.imgur.com/soXNsbe.jpeg'],
    ['name' => 'Dragon Fruits Margarita', 'price' =>9.5,'image' => 'https://i.imgur.com/ufq0OuO.jpg'],
    ['name' => 'Moscow Mule', 'price' => 9,'image' => 'https://i.imgur.com/DGG0IhR.jpg'],
    ['name' => 'whipped vodka ', 'price' => 9,'image' => 'https://i.imgur.com/VNPWLlH.jpeg'],
   
];
 
 
$totalValue = 0;
foreach ($_POST['products'] as $i => $product) {
    $totalValue += ($products[$i]['price']);
}

require 'form-view.php';

