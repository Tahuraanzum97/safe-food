<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Insert Distributor</title>
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
    <h1 class="text-center">Add Distributor</h1>
    <form method="POST" action="insert.php">
      <div class="mb-3">
        <label for="distributor_id" class="form-label">Distributor ID:</label>
        <input type="text" name="distributor_id" class="form-control" required>
      </div>
      <div class="mb-3">
        <label for="distributor_name" class="form-label">Distributor Name:</label>
        <input type="text" name="distributor_name" class="form-control" required>
      </div>
      <div class="mb-3">
        <label for="location" class="form-label">Location:</label>
        <input type="text" name="location" class="form-control" required>
      </div>
      <div class="mb-3">
        <label for="type" class="form-label">Type:</label>
        <input type="text" name="type" class="form-control" required>
      </div>
      <div class="mb-3">
        <label for="storage_capacity" class="form-label">Storage Capacity:</label>
        <input type="text" name="storage_capacity" class="form-control" required>
      </div>
      <div class="mb-3">
        <label for="status" class="form-label">Status:</label>
        <input type="text" name="status" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-success">Add Distributor</button>
    </form>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
