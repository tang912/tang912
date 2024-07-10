<?php
require('connection.php');

if (isset($_POST['submit'])) {
    $user = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $role = mysqli_real_escape_string($con, $_POST['role']);

    $sql = mysqli_query($con, "INSERT INTO registration (user, password, role) VALUES ('$user', '$password', '$role')");

    // Check for SQL errors
    if (!$sql) {
        echo "Error: " . mysqli_error($con);
        exit;
    }

    if (mysqli_affected_rows($con) > 0) {
        echo "<script>alert('New Record Added')</script>";
        echo "<script>window.location='loginAdmin.php';</script>";
    } else {
        echo "<script>alert('Failed to Add record')</script>";
    }
}
?>

<html>
<head>
    <title>Registration</title>
</head>
<body>
    <h3>Add User</h3>
    <form method="POST">
        <div>
            <label>username:</label>
            <input type="text" name="username">
        </div>
        <div>
            <label>password:</label>
            <input type="text" name="password">
        </div>
        <div>
            <label>Role:</label>
            <input type="text" name="role">
        </div>
        <div>
            <button type="submit" name="submit">Save</button>
        </div>
    </form>
</body>
</html>
