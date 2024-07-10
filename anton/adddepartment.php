<?php
require('connection.php');

if (isset($_POST['submit'])) {
    $deptName = mysqli_real_escape_string($con, $_POST['deptName']);
    



    $sql = mysqli_query($con, "INSERT INTO department (deptName) VALUES ('$deptName')");

    // Check for SQL errors
    if (!$sql) {
        echo "Error: " . mysqli_error($con);
        exit;
    }

    if (mysqli_affected_rows($con) > 0) {
        echo "<script>alert('New Record Added')</script>";
        echo "<script>window.location='viewevent.php';</script>";
    } else {
        echo "<script>alert('Failed to Add record')</script>";
    }
}
?>

<html>
<head>
    <title>Add Department</title>
</head>
<body>
<h1>UC MAIN INTRAMURALS SYSTEM</h1>
    <h3>Add Department</h3>
    <form method="POST">
        <div>
            <label>Department Name:</label>
            <input type="text" name="deptName">
        </div>
        <div>
            <button type="submit" name="submit">Save</button>
            <a href="viewevent.php">View Information</a>
        </div>
    </form>
</body>
</html>
