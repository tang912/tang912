<?php
include ("dbcon.php");

session_start(); 

if(isset($_SESSION['currentUser'])) {
    
}

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

  
    $sql = "SELECT username, password, role FROM regi WHERE username='$username' AND password='$password'";
    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result) > 0 ){
        $row = mysqli_fetch_assoc($result); 
        $_SESSION['currentUser'] = $username;
        $_SESSION['role'] = $row['role']; 

        switch ($row['role']) {
            case 'Admin':
                header("location: admin.php");
                break;
            case 'Coach':
                header("location: coach.php");
                break;
            case 'Tournament Manager':
                header("location: tournamentmanager.php");
                break;
            case 'at':
                header("location: coach.php");
                break;
            case 'Dean':
                header("location: deanMenu.php");
                break;
            
        }
        exit; 
    } else {
        echo "LOGIN FAILED";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>LOGIN</h1>
    <form method="POST" action="login.php">
        <label>USERNAME</label>
        <input type="text" name="username" required/><br>
        
        <label>PASSWORD</label>
        <input type="password" name="password" required/><br>
        
        <button type="submit" name="login">LOGIN</button>
    </form>
</body>
</html>