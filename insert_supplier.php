<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the required fields are set
    $supplierid = isset($_POST['supplierid']) ? $_POST['supplierid'] : '';
    $company_name = isset($_POST['company_name']) ? $_POST['company_name'] : '';
    $rep_fname = isset($_POST['rep_fname']) ? $_POST['rep_fname'] : '';
    $rep_lname = isset($_POST['rep_lname']) ? $_POST['rep_lname'] : '';
    $referred_by = isset($_POST['referred_by']) ? $_POST['referred_by'] : '';

    // Ensure the fields are not empty
    if (!empty($supplierid) && !empty($company_name) && !empty($rep_fname) && !empty($rep_lname)) {
        // Check if the supplier already exists
        $check_sql = "SELECT supplierid FROM suppliers WHERE supplierid = '$supplierid'";
        $result = $conn->query($check_sql);

        if ($result->num_rows > 0) {
            // Supplier already exists, skip insertion
            echo "<div class='alert alert-warning'>Supplier with ID '$supplierid' already exists. No insertion was made.</div>";
        } else {
            // Insert the new supplier
            $insert_sql = "INSERT INTO suppliers (supplierid, company_name, rep_fname, rep_lname, referred_by)
                           VALUES ('$supplierid', '$company_name', '$rep_fname', '$rep_lname', '$referred_by')";

            if ($conn->query($insert_sql) === TRUE) {
                echo "<div class='alert alert-success'>Supplier added successfully</div>";
            } else {
                echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
            }
        }
    } else {
        echo "<div class='alert alert-danger'>Please fill in all the required fields.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Supplier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="container">

    <h2 class="my-4">Insert New Supplier</h2>
    <form method="POST" action="insert_supplier.php" class="mb-3">
        <div class="form-group">
            <label>Supplier ID:</label>
            <input type="text" name="supplierid" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Company Name:</label>
            <input type="text" name="company_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label>First Name:</label>
            <input type="text" name="rep_fname" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Last Name:</label>
            <input type="text" name="rep_lname" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Referred By (Supplier ID):</label>
            <input type="text" name="referred_by" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary mt-2">Insert Supplier</button>
    </form>

    <a href="index.php" class="btn btn-secondary">Back to Home</a>

</body>
</html>
