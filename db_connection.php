<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname= "distributor_dashboard";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
        }
    else{
        mysqli_select_db($conn, $dbname);
        }
?>