<?php
include 'db_connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL Query Interface</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="container">

    <h1 class="my-4">Enter SQL Query</h1>
    <form method="post" class="mb-3">
        <div class="form-group">
            <textarea name="query" rows="4" class="form-control" placeholder="Enter your SQL query here"></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Execute Query</button>
    </form>

    <?php
    // Check if form was submitted and query is not empty
    if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['query'])) {
        $sql = $_POST['query'];
        
        // Attempt to execute the SQL query
        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success'>Query executed successfully</div>";
        } else {
            echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
        }
    } elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Show a warning message if query is empty
        echo "<div class='alert alert-warning'>Please enter a valid SQL query.</div>";
    }
    ?>

    <a href="insert_supplier.php" class="btn btn-secondary">Add New Supplier</a>
    <a href="er_diagram.php" class="btn btn-info">View ER Diagram</a>

</body>
</html>
