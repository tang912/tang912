<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if(isset($_SESSION['success_message'])){
            echo $_SESSION['success_message'];
            unset($_SESSION['success_message']);
        }
    ?>
    <a href="/register.php">Register</a>
    <a href="/login.php">Login</a>
</body>
</html>
