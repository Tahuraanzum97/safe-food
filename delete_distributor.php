<?php

include 'db_connection.php';

if (isset($_GET['id'])) {
    $distributor_id = $_GET['id'];

    $sql = "DELETE FROM distributor WHERE distributor_id = '$distributor_id'";

    if ($conn->query($sql) === TRUE) {

        header("Location: index.php"); 
        exit();
    } else {

        echo "Error deleting record: " . $conn->error;
    }
} else {

    echo "No distributor ID specified!";
}

$conn->close();
?>
