<?php
require('connection.php');

if (isset($_POST['submit'])) {
    $fName = mysqli_real_escape_string($con, $_POST['fname']);
    $lName = mysqli_real_escape_string($con, $_POST['lname']);
    $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
    $deptID = mysqli_real_escape_string($con, $_POST['deptID']);



    $sql = mysqli_query($con, "INSERT INTO coach (fname, lname, mobile,deptID) VALUES ('$fName', '$lName', '$mobile','$deptID')");

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
    <title>Add Coach</title>
</head>
<body>
<h1>UC MAIN INTRAMURALS SYSTEM</h1>
    <h3>Add Coach</h3>
    <form method="POST">
        <div>
            <label>fname:</label>
            <input type="text" name="fname">
        </div>
        <div>
            <label>lname:</label>
            <input type="text" name="lname">
        </div>
        <div>
            <label>Mobile:</label>
            <input type="text" name="mobile">
        </div>
        <div>
            <label>Dept ID:</label>
            <input type="text" name="deptID">
        </div>
        <div>
            <button type="submit" name="submit">Save</button>
        </div>
    </form>
</body>
</html>
