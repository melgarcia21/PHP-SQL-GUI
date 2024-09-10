<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $supplierid = $_POST['supplierid'];
    $company_name = $_POST['company_name'];
    $rep_fname = $_POST['rep_fname'];
    $rep_lname = $_POST['rep_lname'];
    $referred_by = $_POST['referred_by'];

    $sql = "INSERT INTO suppliers (supplierid, company_name, rep_fname, rep_lname, referred_by)
            VALUES ('$supplierid', '$company_name', '$rep_fname', '$rep_lname', '$referred_by')";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Supplier added successfully</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
    }
}
?>

<a href="index.php" class="btn btn-primary">Back to Home</a>
