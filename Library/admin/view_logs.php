<?php
// Include the database connection file
include "connection.php"; // Ensure the path is correct
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['login_admin'])) {
    header("Location: login.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Logs</title>
    <link rel="stylesheet" type="text/css" href="style.css">

    <!-- Bootstrap CSS -->
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

        table {
            width: 100%;
            margin-top: 20px;
            background-color: #34495e;
            border-radius: 5px;
            overflow: hidden;
        }

        table th, table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #7f8c8d;
        }

        table th {
            background-color: #1abc9c;
            color: white;
        }

        table tr:hover {
            background-color: #16a085;
            color: white;
        }

        .btn-primary {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Activity Logs</h1>
        <a href="dashboard.php" class="btn btn-primary">Back to Dashboard</a>
        <table>
            <thead>
                <tr>
                    <th>Log ID</th>
                    <th>Description</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Query to fetch logs from the database
                $query = "SELECT * FROM logs ORDER BY date DESC";
                $result = mysqli_query($db, $query);

                // Check if logs exist
                if ($result && mysqli_num_rows($result) > 0) {
                    // Loop through each log entry
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['description']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['date']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    // Display a message if no logs are found
                    echo "<tr><td colspan='3'>No logs found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
