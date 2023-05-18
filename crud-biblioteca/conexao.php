<?php

$host = "localhost";
$user = "root";
$pass = "*****";
$dbname = "crud";

//Conexão com a porta
$coon = new PDO("mysql:host=$host;dbname=".$dbname, $user, $pass);