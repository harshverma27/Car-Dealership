<?php
include '../includes/db.php'; // Include the database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $expiry_date = $_POST['expiry_date'];

    $query = "INSERT INTO promotions (Title, Description, Expiry_date) VALUES ('$title', '$description', '$expiry_date')";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Promotion added successfully!');</script>";
    } else {
        echo "<script>alert('Error adding promotion!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Promotion</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Add New Promotion</h1>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="title" class="form-label">Promotion Title</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
            </div>
            <div class="mb-3">
                <label for="expiry_date" class="form-label">Expiry Date</label>
                <input type="date" name="expiry_date" id="expiry_date" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Promotion</button>
        </form>
    </div>
</body>
</html>
