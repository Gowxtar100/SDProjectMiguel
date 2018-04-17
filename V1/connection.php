<?php

//Connect to DATABASE

$connectusername = 'root';
$connectpassword = '';

$db = 'gamedatabase';

$db = new mysqli('localhost', $connectusername, $connectpassword, $db) or die("Unable to connect");

//Get values from form

if (isset($_POST['Submit'])) {
    $Username = $_POST["username"];
    $EmailAdd = $_POST["email"];
    $Password = $_POST["password"];
    
     $query = "INSERT INTO `user` (username, email, password) VALUES ('$Username', '$EmailAdd', '$Password')";
        $result = mysqli_query($db, $query);
        if($result){
           header('Location: registercomplete.php');
        }else{
           header('Location: registerfail.php');
        }
}
?>﻿