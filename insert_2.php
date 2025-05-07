<?php
     require_once("db_connection.php");

    $shipment_id = $_POST['shipment_id'];
    $dispatch_date = $_POST['dispatch_date'];
    $arrival_date = $_POST['arrival_date'];
    $quantity_shipped = $_POST['quantity_shipped'];
    $shipment_status = $_POST['shipment_status'];

    $sql = "INSERT INTO distributor_shipments (shipment_id, dispatch_date, arrival_date, quantity_shipped, shipment_status)
            VALUES ('$shipment_id', '$dispatch_date', '$arrival_date', '$quantity_shipped', '$shipment_status')";

    if ($conn->query($sql)) {

            mysqli_close($conn);

            header("Location:index.php");
            exit();
        } else {

            mysqli_close($conn);

            header("Location:insert_shipment.php");
            exit();
        }
?>