<?php
    require_once("db_connection.php");

    $distributor_id = $_POST['distributor_id'];
    $distributor_name = $_POST['distributor_name'];
    $location = $_POST['location'];
    $type = $_POST['type'];
    $storage_capacity = $_POST['storage_capacity'];
    $status = $_POST['status'];

    
    $sql = "INSERT INTO distributor (distributor_id, distributor_name, location, type, storage_capacity, status) 
            VALUES ('$distributor_id', '$distributor_name', '$location', '$type', '$storage_capacity', '$status')";

    if ($conn->query($sql)) {

            mysqli_close($conn);

            header("Location: index.php");
            exit();
        } else {

            mysqli_close($conn);

            header("Location: insert_distributor.php");
            exit();
        }
?>