<?php
session_start();
if (!isset($_SESSION['cart'])) {
        $_SESSION["cart"] = array();
        $_SESSION["totalprice"] = array();
        $_SESSION["quantity"] = array();
     }
     else {
        if (isset($_POST['Submit'])) {
         $productid = $_SESSION["productid"];
         $quantity = $_POST["quantity"];
         $price =  $_SESSION["productprice"]*$quantity;


    
    $_SESSION["cart"][]= $productid;
    $_SESSION["totalprice"][] = $price;
    $_SESSION["quantity"][$productid] = $quantity;
    header("Location: products.php?added=1");
     } 
         
     
     }

?>