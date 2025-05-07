<?php

include 'db_connection.php';

if (isset($_GET['id'])) {
    $shipment_id = $_GET['id'];

    $sql = "DELETE FROM distributor_shipments WHERE shipment_id = '$shipment_id'";

    if ($conn->query($sql) === TRUE) {

        header("Location: index.php"); 
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "No shipment ID specified!";
}

$conn->close();
?>
