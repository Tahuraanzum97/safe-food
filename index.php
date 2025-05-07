<?php

include 'db_connection.php';

$product = null;
$message = "";

if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];  
    $sql = "SELECT * FROM products WHERE product_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $product_id); 
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {

        $product = $result->fetch_assoc();
    } else {
        $message = "Product not found.";
    }

    $stmt->close();
    mysqli_close($conn);
}

$distributor_sql = "SELECT * FROM distributor";
$distributor_result = $conn->query($distributor_sql);

$shipment_sql = "SELECT * FROM distributor_shipments";
$shipment_result = $conn->query($shipment_sql);

if ($distributor_result->num_rows > 0) {
    $distributor_counter = 1;
} else {
    echo "No distributor data found.";
}

if ($shipment_result->num_rows > 0) {
    $shipment_counter = 1;
} else {
    echo "No shipment data found.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Distributor Dashboard | PureHarvest Safety</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .modal-header, .modal-footer {
      background-color: #198754;
      color: white;
    }
    #formModal, #shipmentFormModal {
      display: none;
      position: fixed;
      top: 10%;
      left: 50%;
      transform: translateX(-50%);
      background: white;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 10px;
      z-index: 1000;
      width: 400px;
    }
    #overlay {
      display: none;
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background: rgba(0,0,0,0.5);
      z-index: 500;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-success">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">PureHarvest Safety</a>
    <a class="btn btn-light ms-auto" href="index.html">Back to Dashboard</a>
  </div>
</nav>

<section class="py-5 bg-success text-white text-center">
  <div class="container">
    <h1>Distributor Dashboard</h1>
    <p>Manage your purchases, shipments, and track products.</p>
  </div>
</section>

<div class="container my-5">
  <ul class="nav nav-tabs" id="dashboardTabs" role="tablist">
    <li class="nav-item">
      <button class="nav-link active" id="Distributor-tab" data-bs-toggle="tab" data-bs-target="#Distributor" type="button" role="tab">Distributor</button>
    </li>
    <li class="nav-item">
      <button class="nav-link" id="shipment-tab" data-bs-toggle="tab" data-bs-target="#shipment" type="button" role="tab">Distributor Shipments</button>
    </li>
    <li class="nav-item">
      <button class="nav-link" id="track-tab" data-bs-toggle="tab" data-bs-target="#track" type="button" role="tab">Track Product</button>
    </li>
  </ul>

  <div class="tab-content" id="dashboardTabsContent">
    <!-- Distributor Tab -->
    <div class="tab-pane fade show active" id="Distributor" role="tabpanel">
      <h3 class="mt-4">Distributor</h3>
      <a href="insert_distributor.php" class="btn btn-success mb-3">Add Distributor</a>
      <form method="POST" action="delete_table_distributor.php">
        <button type="submit" class="btn btn-danger mb-3">Delete</button>
      </form>

      <table class="table table-bordered" id="distributorTable">
        <thead>
          <tr>
            <th>No.</th>
            <th>Distributor ID</th>
            <th>Distributor Name</th>
            <th>Location</th>
            <th>Type</th>
            <th>Storage Capacity</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="distributorTableBody">
          <?php
          if ($distributor_result->num_rows > 0) {
              while($row = $distributor_result->fetch_assoc()) {
                  echo "<tr>
                          <td>" . $distributor_counter . "</td>
                          <td>" . $row['distributor_id'] . "</td>
                          <td>" . $row['distributor_name'] . "</td>
                          <td>" . $row['location'] . "</td>
                          <td>" . $row['type'] . "</td>
                          <td>" . $row['storage_capacity'] . "</td>
                          <td>" . $row['status'] . "</td>
                          <td>
                              <a href='update_distributor.php?id=" . $row['distributor_id'] . "' class='btn btn-primary btn-sm'>Update</a>
                              <a href='delete_distributor.php?id=" . $row['distributor_id'] . "' class='btn btn-danger btn-sm'>Delete</a>
                          </td>
                        </tr>";
                  $distributor_counter++;
              }
          }
          ?>
        </tbody>
      </table>
    </div>

    <!-- Distributor Shipments Tab -->
    <div class="tab-pane fade" id="shipment" role="tabpanel">
      <h3 class="mt-4">Distributor Shipments</h3>
      <a href="insert_shipment.php" class="btn btn-success mb-3">Add New Shipment</a>
      <form method="POST" action="delete_table_shipment.php">
        <button type="submit" class="btn btn-danger mb-3">Delete All Shipments</button>
      </form>

      <table class="table table-bordered" id="shipmentTable">
        <thead>
          <tr>
            <th>No.</th>
            <th>Shipment ID</th>
            <th>Dispatch Date</th>
            <th>Arrival Date</th>
            <th>Quantity Shipped</th>
            <th>Shipment Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="shipmentTableBody">
          <?php
          if ($shipment_result->num_rows > 0) {
              while($row = $shipment_result->fetch_assoc()) {
                  echo "<tr>
                          <td>" . $shipment_counter . "</td>
                          <td>" . $row['shipment_id'] . "</td>
                          <td>" . $row['dispatch_date'] . "</td>
                          <td>" . $row['arrival_date'] . "</td>
                          <td>" . $row['quantity_shipped'] . "</td>
                          <td>" . $row['shipment_status'] . "</td>
                          <td>
                              <a href='update_shipment.php?id=" . $row['shipment_id'] . "' class='btn btn-primary btn-sm'>Update</a>
                              <a href='delete_shipment.php?id=" . $row['shipment_id'] . "' class='btn btn-danger btn-sm'>Delete</a>
                          </td>
                        </tr>";
                  $shipment_counter++;
              }
          }
          ?>
        </tbody>
      </table>
    </div>

    <div class="tab-pane fade" id="track" role="tabpanel">
      <h3 class="mt-4">Track Product</h3>
      <!-- Product Tracking Form -->
      <form method="POST" action="track.php">
        <div class="form-group">
            <label for="productId">Enter Product ID:</label>
            <input type="text" id="productId" name="product_id" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Track</button>
      </form>

      <div id="trackResult" class="mt-4">
        <?php if ($message) { ?>
            <div class="alert alert-warning">
                <?php echo $message; ?>
            </div>
        <?php } else if ($product) { ?>
            <h4>Product Details:</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Location</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $product['product_id']; ?></td>
                    <td><?php echo $product['product_name']; ?></td>
                    <td><?php echo $product['location']; ?></td>
                    <td><?php echo $product['status']; ?></td>
                </tr>
            </tbody>
        </table>
    <?php } ?>
  </div>
</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
