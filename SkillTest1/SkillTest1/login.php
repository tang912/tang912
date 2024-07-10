<?php
    session_start(); //Memorize
    include("database.php"); //Memorize

    if(isset($_SESSION['hasLoggedIn']) && $_SESSION['hasLoggedIn']){
        header("location: home.php");
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
<form action="login.php" method="POST">
        <div>
            <label>Username</label>
            <input type="text" name="username" />
        </div>
        <div>
            <label>Password</label>
            <input type="password" name="password" />
        </div>
        <button type="submit" name="login">Login</button>
    </form>
    <a href="/index.php">Back</a>
    <?php
        if(isset($_POST['login'])){ //Memorize
            
            $username = $_POST['username']; //Memorize
            $password = $_POST['password']; //Memorize

            //Get User by entered username
            //SELECT * FROM User - DML
            $query = $conn->prepare("SELECT * FROM user WHERE username = ?"); //Memorize
            $query->bind_param("s", $username); //Memorize
            $query->execute(); //Memorize


            $result = $query->get_result(); //Memorize

            $user = $result->fetch_assoc(); //Memorize

            if($user){
                
                $password_matched = password_verify($password, $user['password']);

                if($password_matched){

                    $_SESSION['hasLoggedIn'] = true;
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['fullName'] = $user['first_name'] . ' ' . $user['last_name'];
                    $_SESSIOn['role'] = $user['role'];
                    
                    if($user['role'] === 'ADMIN'){
                        header("location: admin_home.php");
                    }else{
                        header("location: home.php");
                    }
                    

                    exit();
                }

            }
        }
    ?>
</body>
</html>