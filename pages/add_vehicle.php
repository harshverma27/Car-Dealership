<?php
include '../includes/db.php'; // Include the database connection

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $manufacturer = $_POST['manufacturer'];
    $model = $_POST['model'];
    $year = $_POST['year'];
    $price = $_POST['price'];
    $specifications = $_POST['specifications'];

    $query = "INSERT INTO vehicles (Manufacturer, Model, Year, Price, Specifications) 
              VALUES ('$manufacturer', '$model', '$year', '$price', '$specifications')";
    
    if (mysqli_query($conn, $query)) {
        $message = "Vehicle added successfully!";
    } else {
        $message = "Error adding vehicle: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Vehicle</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Add New Vehicle</h1>

        <!-- Display Success/Failure Message -->
        <?php if (isset($message)): ?>
            <div class="alert <?php echo (strpos($message, 'successfully') !== false) ? 'alert-success' : 'alert-danger'; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <!-- Vehicle Form -->
        <form method="POST" action="">
            <div class="mb-3">
                <label for="manufacturer" class="form-label">Manufacturer</label>
                <input type="text" name="manufacturer" id="manufacturer" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="model" class="form-label">Model</label>
                <input type="text" name="model" id="model" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="year" class="form-label">Year</label>
                <input type="number" name="year" id="year" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price (INR)</label>
                <input type="number" name="price" id="price" step="0.01" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="specifications" class="form-label">Specifications</label>
                <textarea name="specifications" id="specifications" rows="4" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Vehicle</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
