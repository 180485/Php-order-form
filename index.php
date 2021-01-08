<?php
/*declare(strict_types=1);
declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1'); */


// We are going to use session variables so we need to enable sessions
session_start();





// define variables and initialize with empty values
$emailErr = $streetrErr = $numberErr = $cityErr = $ZipcodeErr = $productErr = "";
$email = $street = $streetnumber = $city = $zipcode = $product = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["email"])) {
        $emailErr = "Missing";
    }
    else {
        $email = $_POST["email"];
    }

    if (empty($_POST["street"])) {
        $streetErr = "Missing";
    }
    else {
        $street = $_POST["street"];
    }

    if (empty($_POST["streetnumber"]))  {
        $numberErr = "Missing";

    }
    
    else {
        $streetnumber = $_POST["streetnumber"];
    
    } 
    if (empty($_POST["city"])) {
        $cityErr = "Missing";

    }
    else {
        $city = $_POST["city"];

    }
    
    if (empty($_POST["zipcode"])) {
        $zipcodeErr = "Missing";
    }
    else {
        $zipcode = $_POST["zipcode"];

    }
    if (empty($_POST["products"])) {
        $productsErr = "You didnt choose your order .";
    }
    else {
        $products = $_POST["products"];
 
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

$products = [
    ['name' => 'Ramen From the chef', 'price' => 10.20],
    ['name' => 'Sashimi Salmon', 'price' => 8],
    ['name' => 'California Roll', 'price' => 9],
    ['name' => 'Scallop Roll', 'price' => 10],
    ['name' => 'Spicy Tuna', 'price' => 6],
    ['name' => 'Whiskey Sour', 'price' => 10],
    ['name' => 'Bloody Caesar', 'price' =>9.5],
    ['name' => 'Margarita', 'price' => 9],
    ['name' => 'Sake', 'price' => 8],
    
   
];
 
$totalValue = 0;
foreach ($_POST['products'] as $i => $product) {
    $totalValue += ($products[$i]['price']);
}

require 'form-view.php';
