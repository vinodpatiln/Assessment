<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "user_information";
    try {
       
        $conn = mysqli_connect($servername, $username, $password, $db);
         //echo "Connected successfully"; 
        }
    catch(exception $e)
        {
        echo "Connection failed: " . $e->getMessage();
        }
        return $conn;

?>