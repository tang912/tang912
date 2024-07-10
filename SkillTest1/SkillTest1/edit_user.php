<?php
    session_start();
    include("database.php");

    // if(!$_SESSION['hasLoggedIn'] && $_SESSION['role'] != 'ADMIN'){
        
    //     header("location: index.php");

        
    // }else if($_SESSION['hasLoggedIn'] && $_SESSION['role'] == 'USER'){
    //     header("location: home.php");
    // }
   
    //exit();

    $id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>Edit User</div>
    <form action="edit_user.php" method="POST">
        <?php

            

            $query = $conn->prepare('SELECT * FROM user WHERE id = ?');
            $query->bind_param("s", $id);
            $query->execute();

            $result = $query->get_result();

            $user = $result->fetch_assoc();
            echo '<input type="hidden" name="id" value="'.$id.'/>';
            echo '
            <div>
                <label>Username</label> 
                <input type="text" name="" value="' . $user['username'] . '" />' .
            '</div>
            <div>
                <label>Username</label> 
                <input type="text" name="username" value="' . $user['username'] . '" />' .
            '</div>
            <div>
                <label>First Name</label>
                <input type="text" name="firstName" value="' . $user['first_name'] . '" />' .
            '</div>
            <div>
                <label>Last Name</label>
                <input type="text" name="lastName" value="' . $user['last_name'] . '" />' .
            '</div>
            <div>
                <label>Gender</label>
                <select name="gender">
                    <option value="0" ' . (($user['gender']==0) ? "selected" : "")  . '>Male</option>' .
                    '<option value="1" ' . (($user['gender']==1) ? "selected" : "")  . '>Female</option>' .
                '</select>
            </div>
            <div>
                <label>Age</label>
                <input type="text" name="age" value="' . $user['age'] . '" />' .
            '</div>';
        ?>
        <div>
            <label>Password</label>
            <input type="password" name="password" />
        </div>
        <div>
            <label>Confirm Password</label>
            <input type="password" name="confirmPassword" />
        </div>
        <button type="submit" name="edit">Register</button>
    </form>
    <a href="/admin_home.php">Back</a>
    <?php


        
        if(isset($_POST['edit'])){
            
            $id = $_POST['id'];
            $username = $_POST['username'];//Memorize
            $firstName = $_POST['firstName']; //Memorize
            $lastName = $_POST['lastName']; //Memorize
            $gender = $_POST['gender']; //Memorize
            $age = $_POST['age']; //Memorize
            $password = $_POST['password'];//Memorize
            $confirmPassword = $_POST['confirmPassword']; //Memorize

            $password_matched = true;

            $query = "";

            if(empty($passsword) && empty($confirmPassword)){

                $query = $conn->prepare("UPDATE user SET username = ?, first_name = ?, last_name = ?, gender = ?, age = ? WHERE id=?");
                $query->bind_param("ssssss", $username, $firstName, $lastName, $gender, $age, $id);
                $query->execute();
    
                $query->close();
                $conn->close();
    
                $_SESSION['success_message'] = "The user has been edited!";
    
                header("location: admin_home.php");
    
                exit();
                
            }else if($password === $confirmPassword){
                $password_encrypted = password_hash($password, PASSWORD_DEFAULT);
                $query = $conn->prepare("UPDATE user SET username = ?, first_name = ?, last_name = ?, gender = ?, age = ?, password = ? WHERE id=?");
                $query->bind_param("sssssss", $username, $firstName, $lastName, $gender, $age, $password_encrypted , $id);
                $query->execute();
    
                $query->close();
                $conn->close();
    
                $_SESSION['success_message'] = "The user has been edited!";
    
                header("location: admin_home.php");
    
                exit();
            }

    

        }
    ?>
</body>
</html>