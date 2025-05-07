<?php
include 'db_connection.php'; 

$sql = "SELECT * FROM distributor";
$result = $conn->query($sql);

echo "<h2>Distributors</h2>";
echo "<table class='table table-bordered'>";
echo "<tr><th>Distributor ID</th><th>Distributor Name</th><th>Location</th><th>Type</th><th>Storage Capacity</th><th>Status</th><th>Action</th></tr>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row['distributor_id'] . "</td><td>" . $row['distributor_name'] . "</td><td>" . $row['location'] . "</td><td>" . $row['type'] . "</td><td>" . $row['storage_capacity'] . "</td><td>" . $row['status'] . "</td><td>
              <button class='btn btn-primary btn-sm'>Update</button>
              <button class='btn btn-danger btn-sm'>Delete</button></td></tr>";
    }
} else {
    echo "0 results";
}
echo "</table>";
?>
