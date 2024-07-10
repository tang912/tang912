<?php
include("dbcon.php");

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $role = $_POST['role'];

    $sql = "SELECT * FROM regi WHERE username='$username'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "USER ALREADY EXISTS.";
   
    } else {
        if ($password == $confirmPassword) {
            
            $sql = "INSERT INTO regi (`username`, `password`, `confirmPassword`, `role`) VALUES ('" . $username . "','" . $password . "','" . $confirmPassword ."','" . $role . "')";
            $result = mysqli_query($con, $sql);

            if ($result) {
                echo "REGISTERED SUCCESSFULLY";
                header("location: login.php"); 
                
            } else {
                echo "REGISTRATION FAILED";
            }
        } else {
            echo "PASSWORDS DO NOT MATCH";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <h1>Registration</h1>
    <form method="POST" action="registration.php">
        <label>Username</label>
        <input type="text" name="username" required><br>
        
        <label>Password</label>
        <input type="password" name="password" required><br>
        
        <label>Confirm Password</label>
        <input type="password" name="confirmPassword" required><br>
        
        <label></label>
        <select name="role" required>
            <option value="Admin">Admin</option>
            <option value="Athlete">Athlete</option>
            <option value="Tournament Manager">Tournament Manager</option>
            <option value="Coach">Coach</option>
            <option value="Dean">Dean</option>
        </select><br>
        
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>
