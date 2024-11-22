<?php
// Include the database connection file
include "connection.php"; 

session_start();

// Check if the admin is logged in
if (!isset($_SESSION['login_admin'])) {
    header("Location: login.php");
    exit();
}

$admin_username = $_SESSION['login_admin']; // Get the logged-in admin's username

// Get the user ID from the URL
if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // Fetch the user data from the database
    $query = "SELECT * FROM users WHERE id = '$user_id'";
    $result = mysqli_query($db, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
    } else {
        die("User not found.");
    }
} else {
    die("No user ID provided.");
}

// Update the user data if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];

    // Update query
    $update_query = "UPDATE users SET username = '$username', email = '$email' WHERE id = '$user_id'";
    if (mysqli_query($db, $update_query)) {
        header("Location: manage_users.php");
    } else {
        echo "Error updating user: " . mysqli_error($db);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: #2c3e50;
            color: white;
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 50px;
        }
        h1 {
            color: #ecf0f1;
        }
        .form-group {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit User</h1>
        <form method="POST" action="">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update User</button>
            <a href="manage_users.php" class="btn btn-danger">Cancel</a>
        </form>
    </div>
</body>
</html>
