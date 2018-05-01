<?php
    session_start();
    $_SESSION["cart"] = array();
    $_SESSION["totalprice"] = array();

    header("Location: viewcart.php");
?>