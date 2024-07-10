<?php
   session_start(); //Memorize
   include("database.php"); //Memorize
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="add_user.php" method="POST">
        <div>
            <label>Username</label>
            <input type="text" name="username" />
        </div>
        <div>
            <label>First Name</label>
            <input type="text" name="firstName" />
        </div>
        <div>
            <label>Last Name</label>
            <input type="text" name="lastName" />
        </div>
        <div>
            <label>Gender</label>
            <select name="gender">
                <option value="0">Male</option>
                <option value="1">Female</option>
            </select>
        </div>
        <div>
            <label>Age</label>
            <input type="text" name="age" />
        </div>
        <div>
            <label>Role</label>
            <select name="role">
                <option value="USER">User</option>
                <option value="ADMIN">Admin</option>
            </select>
        </div>
        <div>
            <label>Password</label>
            <input type="password" name="password" />
        </div>
        <div>
            <label>Confirm Password</label>
            <input type="password" name="confirmPassword" />
        </div>
        <button type="submit" name="register">Register</button>
    </form>
    <a href="/index.php">Back</a>
    <?php 

        if(isset($_POST['register'])){ //Memorize

            $username = $_POST['username'];//Memorize
            $firstName = $_POST['firstName']; //Memorize
            $lastName = $_POST['lastName']; //Memorize
            $gender = $_POST['gender']; //Memorize
            $age = $_POST['age']; //Memorize
            $role = $_POST['role']; //Memorize
            $password = $_POST['password'];//Memorize
            $confirmPassword = $_POST['confirmPassword']; //Memorize

            $password_matched = true;

            if($password != $confirmPassword){
                echo "Password doesn't match!";
                $password_matched = false;
            }

            if($password_matched){
                

                $query = $conn->prepare("INSERT INTO user (username, first_name, last_name, gender, age, password, role) VALUES(?,?,?,?,?,?,?)"); //Memorize
                $password_encrypted = password_hash($password, PASSWORD_DEFAULT); //Memorize
                $query->bind_param("sssssss", $username, $firstName, $lastName, $gender, $age, $password_encrypted, $role); //Memorize
                $query->execute(); //Memorize

                $query->close(); //Memorize
                $conn->close(); //Memorize

                //To move 
                header("location: admin_home.php"); //Memorize

                //$_SESSION['variable'] = value;
                $_SESSION['success_message'] = "A new account has been registered!";
 
                exit(); //Memorize
            }


        }
        
        

        
    ?>
</body>
</html>
