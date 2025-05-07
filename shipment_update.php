<?php
include 'db_connection.php';

if (isset($_GET['id'])) {
    $shipment_id = $_GET['id'];

    $sql = "SELECT * FROM distributor_shipments WHERE shipment_id = '$shipment_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Shipment not found!";
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $shipment_id = $_POST['shipment_id'];
    $dispatch_date = $_POST['dispatch_date'];
    $arrival_date = $_POST['arrival_date'];
    $quantity_shipped = $_POST['quantity_shipped'];
    $shipment_status = $_POST['shipment_status'];

    $sql = "UPDATE distributor_shipments SET 
            dispatch_date = '$dispatch_date',
            arrival_date = '$arrival_date',
            quantity_shipped = '$quantity_shipped',
            shipment_status = '$shipment_status'
            WHERE shipment_id = '$shipment_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Shipment updated successfully";
        header("Location:index.php"); 
        exit();
    } else {
        echo "Error updating shipment: " . $conn->error;
    }
}

$conn->close();
?>
