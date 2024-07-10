<?php
    include ("dbcon.php");
?>

<Doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta charset name="viewport" content="width=device-width,
        initial-scale=1.0">
<title>REGISTRATION</title>
</head>

<body>
    <?php
    if (isset($_SESSION['currentUser'])){
        header ("location: menu.php");

    }
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM regis WHERE username='$username' && password='$password'";
        
        $result = mysqli_query($con,$sql);

        if (mysqli_num_rows($result) > 0 ){
           
            $_SESSION['currentUser'] = $username;
                header ("location: menu.php");
             echo "LOGIN SUCCESSFULLY";
        }else{
                echo "LOGIN FAILED";
        }
    }
?>

<h1>LOGIN</h1>
<form method="POST" action="login.php">
<label>USERNAME</label>
<input type="text" name="username" />
</br>

<label>PASSWORD</label>
<input type="password" name="password" />
</br>

<button type="submit" name="login">LOGIN</button>
</form>
</body>
</html>




