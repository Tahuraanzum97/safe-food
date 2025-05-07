<?php
require_once 'db_connect.php';

$success = $error = "";

// Handle deletion if ID is provided
if (isset($_GET['delete_id'])) {
    $id = intval($_GET['delete_id']);

    $stmt = $conn->prepare("SELECT * FROM Cold_Storage WHERE ColdStorageID = ?");
    $stmt->execute([$id]);
    $storage = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($storage) {
        $stmt = $conn->prepare("DELETE FROM Cold_Storage WHERE ColdStorageID = ?");
        if ($stmt->execute([$id])) {
            $success = "✅ Cold Storage deleted successfully.";
        } else {
            $error = "❌ Failed to delete Cold Storage.";
        }
    } else {
        $error = "❌ Record not found.";
    }
}

// Fetch all Cold Storage data
$stmt = $conn->query("SELECT * FROM Cold_Storage ORDER BY ColdStorageID DESC");
$storages = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Cold Storage</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f5f7fa; }
        .container { margin-top: 50px; }
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
        <li class="nav-item"><a class="nav-link" href="dashboard.php">Back </a></li>      
      </ul>
    </div>
  </div>
</nav>

<!-- Main Section -->
<div class="container">
    <h3 class="text-center my-4">Cold Storage Records</h3>

    <?php if ($success): ?>
        <div class="alert alert-success"><?= $success ?></div>
    <?php elseif ($error): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-success text-center">
                <tr>
                    
                    <th>Location</th>
                    <th>Capacity</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php if ($storages): ?>
                    <?php foreach ($storages as $index => $storage): ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td><?= htmlspecialchars($storage['Location']) ?></td>
                            <td><?= htmlspecialchars($storage['Capacity']) ?></td>
                            <td>
                                <a href="delete_cold_storage.php?delete_id=<?= $storage['ColdStorageID'] ?>" 
                                   class="btn btn-sm btn-danger"
                                   onclick="return confirm('Are you sure you want to delete this record?');">
                                    🗑️ Delete
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="5" class="text-muted">No records found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
