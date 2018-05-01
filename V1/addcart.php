<?php
session_start();



    $price = $_SESSION["productprice"];
    $productid = $_SESSION["productid"];
    
    $cart = array($price,$productid);
        $arrlength = count($cart);

    for($x = 0; $x < $arrlength; $x++) {
        echo $cart[$x];
        echo "<br>";
    }
   

?>