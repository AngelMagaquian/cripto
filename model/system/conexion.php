<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cripto_bd";
    
    $conexion = mysqli_connect($servername, $username, $password, $dbname);

    if ($conexion == null) {
        echo "Failed to connect to MySQL: cripto_bd";
        exit();
    }
    
    
?>