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
    if (isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];
        $role = $_POST['role'];

$sql = "SELECT * FROM regis WHERE username='$username'";
$result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0){
        echo "USERS ALREADY EXIST";
    
    }else{
        if ($password == $confirmPassword){
            $sql = "INSERT INTO regis (`username`, `password`, `confirmPassword`, `role`) VALUES ('" . $username . "','" . $password . "','" . $confirmPassword . "','" . $role . "')";
                
                $result = mysqli_query($con, $sql);
                if ($result){
                       
                        header ("location: login.php");
                        echo "REGISTERED SUCCESSFULLY";
                }else{
                        echo "REGISTERED FAILED";
                }
        }else{
                echo "PASSWORD DO NOT MATCH";
        }
    }
}

?>

<h1>REGISTRATION</h1>
<form method="POST" action="registration.php">
<label>USERNAME:</label>
<input type="text" name="username" />
</br>

<label>PASSWORD:</label>
<input type="password" name="password" />
</br>

<label>CONFIRMPASSWORD:</label>
<input type="password" name="confirmPassword" />
</br>

<label>ROLE:</label>
<select name="role">
<option value="Admin">Admin</option>
<option value="Coach">Coach</option>
</br>
</select>

<button type="submit" name="submit">Submit</button>
</form>
</body>
</html>




