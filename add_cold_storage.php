<?php
require_once 'db_connect.php';

$success = $error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $location = trim($_POST['location']);
    $capacity = intval($_POST['capacity']);

    if (!empty($location) && $capacity > 0) {
        try {
            $stmt = $conn->prepare("INSERT INTO Cold_Storage (Location, Capacity) VALUES (:location, :capacity)");
            $stmt->bindParam(':location', $location);
            $stmt->bindParam(':capacity', $capacity);
            $stmt->execute();
            $success = "✅ Cold Storage added successfully.";
        } catch (PDOException $e) {
            $error = "❌ Database error: " . $e->getMessage();
        }
    } else {
        $error = "❌ Please provide valid input.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Cold Storage</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f5f7fa; }
        .container { max-width: 700px; background: #fff; padding: 30px; margin-top: 50px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        nav img { height: 40px; margin-right: 10px; }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-success">
  <div class="container-fluid">
    <a class="navbar-brand d-flex align-items-center" href="dashboard.php">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="dashboard.php">Back</a></li>        
      </ul>
    </div>
  </div>
</nav>

<!-- Main Form Section -->
<div class="container">
    <h3 class="mb-4 text-center">Add New Cold Storage</h3>

    <?php if ($success): ?>
        <div class="alert alert-success"><?= $success ?></div>
    <?php endif; ?>
    <?php if ($error): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST">
        <div class="mb-3">
            <label for="location" class="form-label">Storage Location</label>
            <input type="text" name="location" id="location" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="capacity" class="form-label">Capacity (in units)</label>
            <input type="number" name="capacity" id="capacity" class="form-control" required min="1">
        </div>

        <button type="submit" class="btn btn-success w-100">➕ Add Cold Storage</button>
    </form>
</div>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
