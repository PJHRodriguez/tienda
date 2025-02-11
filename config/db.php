<?php
    $servidor = "localhost";
    $user = "root";
    $password = "";
    $db = "tienda";

    $conn = new mysqli($servidor,$user,$password,$db);

    if($conn->connect_error){
        die("Conexion fallida: ".$conn->connect_error);
    }
?>