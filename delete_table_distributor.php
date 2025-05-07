<?php

require_once("db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $sql = "DELETE FROM distributor";

    if ($conn->query($sql) === TRUE) {

        $resetAutoIncrement = "ALTER TABLE distributor AUTO_INCREMENT = 1";
        if ($conn->query($resetAutoIncrement) === TRUE) {

            echo "All distributor records have been deleted and AUTO_INCREMENT has been reset.";
        } else {

            echo "Error resetting AUTO_INCREMENT: " . $conn->error;
        }

        header("Location: index.php"); 
        exit();
    } else {

        echo "Error deleting records: " . $conn->error;
    }

    $conn->close();
}
?>
