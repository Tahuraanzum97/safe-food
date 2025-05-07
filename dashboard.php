<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Cold Storage Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .card { border-radius: 15px; }
        .navbar-brand img { height: 40px; margin-right: 10px; }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Cold Storage Manager</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link active" href="dashboard.php">Dashboard</a></li>
                <a class="btn btn-light ms-auto" href="index.php">Back</a>
            </ul>
        </div>
    </div>
</nav>

<!-- Dashboard Content -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-5">Welcome to Your Cold Storage Dashboard</h2>
        <div class="row g-4">

            <!-- Add Cold Storage -->
            <div class="col-md-6 col-lg-3">
                <div class="card text-center h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Add Storage</h5>
                        <p class="card-text">Add a new cold storage facility.</p>
                        <a href="add_cold_storage.php" class="btn btn-success">Add</a>
                    </div>
                </div>
            </div>

            <!-- View Cold Storage -->
            <div class="col-md-6 col-lg-3">
                <div class="card text-center h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">View Storage</h5>
                        <p class="card-text">View all cold storage locations.</p>
                        <a href="view_cold_storage.php" class="btn btn-primary">View</a>
                    </div>
                </div>
            </div>

            <!-- Edit Cold Storage -->
            <div class="col-md-6 col-lg-3">
                <div class="card text-center h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Edit Storage</h5>
                        <p class="card-text">Update existing cold storage info.</p>
                        <a href="edit_cold_storage.php" class="btn btn-warning">Edit</a>
                    </div>
                </div>
            </div>

            <!-- Delete Cold Storage -->
            <div class="col-md-6 col-lg-3">
                <div class="card text-center h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Delete Storage</h5>
                        <p class="card-text">Remove storage records from system.</p>
                        <a href="delete_cold_storage.php" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-success text-white text-center py-3 mt-5">
    <div class="container">
        <p class="mb-0">© 2025 Cold Storage Manager | All Rights Reserved</p>
    </div>
</footer>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
