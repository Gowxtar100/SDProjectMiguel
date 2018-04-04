<?php

$username = 'root';
$password = '';

$db = 'gamedatabase';

$db = new mysqli('localhost', $username, $password, $db) or die("Unable to connect");

echo "Great work";

?>﻿