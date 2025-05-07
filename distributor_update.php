<?php

include 'db_connection.php';

if (isset($_GET['id'])) {
    $distributor_id = $_GET['id'];

    $sql = "SELECT * FROM distributor WHERE distributor_id = '$distributor_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Distributor not found!";
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $distributor_id = $_POST['distributor_id'];
    $distributor_name = $_POST['distributor_name'];
    $location = $_POST['location'];
    $type = $_POST['type'];
    $storage_capacity = $_POST['storage_capacity'];
    $status = $_POST['status'];

    $sql = "UPDATE distributor SET 
            distributor_name = '$distributor_name',
            location = '$location',
            type = '$type',
            storage_capacity = '$storage_capacity',
            status = '$status'
            WHERE distributor_id = '$distributor_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Distributor updated successfully";
        header("Location: index.php"); 
        exit();
    } else {
        echo "Error updating distributor: " . $conn->error;
    }
}

$conn->close();
?>
