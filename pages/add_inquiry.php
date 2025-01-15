<?php
include '../includes/db.php'; // Include the database connection

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $query = "INSERT INTO inquiries (Name, Email, Phone, Message, Status) 
              VALUES ('$name', '$email', '$phone', '$message', 'Pending')";
    
    if (mysqli_query($conn, $query)) {
        $message_status = "Inquiry submitted successfully!";
    } else {
        $message_status = "Error submitting inquiry: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Inquiry</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Submit Inquiry</h1>

        <!-- Display Success/Failure Message -->
        <?php if (isset($message_status)): ?>
            <div class="alert <?php echo (strpos($message_status, 'successfully') !== false) ? 'alert-success' : 'alert-danger'; ?>">
                <?php echo $message_status; ?>
            </div>
        <?php endif; ?>

        <!-- Inquiry Form -->
        <form method="POST" action="">
            <div class="mb-3">
                <label for="name" class="form-label">Your Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="text" name="phone" id="phone" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Your Message</label>
                <textarea name="message" id="message" rows="4" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit Inquiry</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
