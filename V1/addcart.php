<?php
session_start();
if (!isset($_SESSION['cart'])) {
        $_SESSION["cart"] = array();
        $_SESSION["totalprice"] = array();
     }
     else {
         $productid = $_SESSION["productid"];
         $price =  $_SESSION["productprice"];
         



    $_SESSION["cart"][]= $productid;
    $_SESSION["totalprice"][] = $price;

    header("Location: products.php?added=1");
     }    


?>