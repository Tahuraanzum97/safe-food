<?php
require_once 'db_connect.php';

// Handle AJAX update request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $location = trim($_POST['location']);
    $capacity = intval($_POST['capacity']);

    if ($location && $capacity > 0) {
        $stmt = $conn->prepare("UPDATE Cold_Storage SET Location = ?, Capacity = ? WHERE ColdStorageID = ?");
        $success = $stmt->execute([$location, $capacity, $id]);

        echo $success ? "success" : "failed to update";
    } else {
        echo "invalid data";
    }
    exit;
}

// Fetch data for display
$stmt = $conn->query("SELECT * FROM Cold_Storage ORDER BY ColdStorageID DESC");
$storages = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cold Storage Manager</title>
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
        <li class="nav-item"><a class="nav-link" href="dashboard.php">Back</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Main Content -->
<div class="container">
    <h3 class="text-center my-4">Cold Storage List</h3>

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
                                <button 
                                    class="btn btn-sm btn-primary"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editModal"
                                    onclick="fillEditForm(<?= $storage['ColdStorageID'] ?>, '<?= htmlspecialchars($storage['Location'], ENT_QUOTES) ?>', <?= $storage['Capacity'] ?>)">
                                    ✏️ Edit
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="4" class="text-muted">No records found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="editForm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Cold Storage</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="editId" name="id">
                <div class="mb-3">
                    <label for="editLocation" class="form-label">Location</label>
                    <input type="text" class="form-control" id="editLocation" name="location" required>
                </div>
                <div class="mb-3">
                    <label for="editCapacity" class="form-label">Capacity</label>
                    <input type="number" class="form-control" id="editCapacity" name="capacity" required>
                </div>
                <div id="editAlert" class="alert d-none"></div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Save</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </form>
  </div>
</div>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
function fillEditForm(id, location, capacity) {
    document.getElementById('editId').value = id;
    document.getElementById('editLocation').value = location;
    document.getElementById('editCapacity').value = capacity;
    document.getElementById('editAlert').classList.add('d-none');
}

document.getElementById('editForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const form = e.target;
    const formData = new FormData(form);

    fetch('', {
        method: 'POST',
        body: formData
    })
    .then(resp => resp.text())
    .then(response => {
        const alert = document.getElementById('editAlert');
        if (response === "success") {
            alert.className = 'alert alert-success';
            alert.innerText = "✅ Updated successfully!";
            alert.classList.remove('d-none');
            setTimeout(() => location.reload(), 1000);
        } else {
            alert.className = 'alert alert-danger';
            alert.innerText = "❌ Update failed: " + response;
            alert.classList.remove('d-none');
        }
    })
    .catch(error => {
        const alert = document.getElementById('editAlert');
        alert.className = 'alert alert-danger';
        alert.innerText = "❌ Error occurred.";
        alert.classList.remove('d-none');
    });
});
</script>

</body>
</html>
