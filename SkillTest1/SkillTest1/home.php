<?php
    session_start();
    include("database.php");

 
    if(!$_SESSION['hasLoggedIn']){
        
        header("location: index.php");

        exit();
    }   
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
        echo '<div> Hi! ' . $_SESSION['fullName'] . '</div>'; 
    ?>
    <form action="home.php" method="POST">
        <button name="logout">Logout</button>
    </form>
    <?php
        if(isset($_POST['logout'])){

            header("location: index.php");

            
            $_SESSION['hasLoggedIn'] = false;
            unset($_SESSION['username']);
            unset($_SESSION['fullName']);

            exit();
        }
    ?>
</body>
</html>