<?php

require_once("db_connection.php");

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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">PureHarvest Safety</a>
    <a class="btn btn-light ms-auto" href="index.php">Back to Dashboard</a>
  </div>
</nav>

<div class="container mt-5">
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
