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
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Update Shipment</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-success">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">PureHarvest Safety</a>
    <a class="btn btn-light ms-auto" href="index.php">Back to Dashboard</a>
  </div>
</nav>

<section class="py-5 bg-light">
  <div class="container">
    <h1 class="text-center">Update Shipment</h1>
    <form method="POST" action="shipment_update.php?id=<?php echo $row['shipment_id']; ?>">
      <div class="mb-3">
        <label for="shipment_id" class="form-label">Shipment ID:</label>
        <input type="text" name="shipment_id" class="form-control" value="<?php echo $row['shipment_id']; ?>" readonly required>
      </div>
      <div class="mb-3">
        <label for="dispatch_date" class="form-label">Dispatch Date:</label>
        <input type="date" name="dispatch_date" class="form-control" value="<?php echo $row['dispatch_date']; ?>" required>
      </div>
      <div class="mb-3">
        <label for="arrival_date" class="form-label">Arrival Date:</label>
        <input type="date" name="arrival_date" class="form-control" value="<?php echo $row['arrival_date']; ?>" required>
      </div>
      <div class="mb-3">
        <label for="quantity_shipped" class="form-label">Quantity Shipped:</label>
        <input type="text" name="quantity_shipped" class="form-control" value="<?php echo $row['quantity_shipped']; ?>" required>
      </div>
      <div class="mb-3">
        <label for="shipment_status" class="form-label">Shipment Status:</label>
        <input type="text" name="shipment_status" class="form-control" value="<?php echo $row['shipment_status']; ?>" required>
      </div>
      <button type="submit" class="btn btn-success">Update Shipment</button>
    </form>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
