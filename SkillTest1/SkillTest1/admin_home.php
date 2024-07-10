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
    <link rel="stylesheet" href="admin_home.css" />
    <title>Document</title>
</head>
<body>
    <div>This is admin home page</div>
    <a href="/add_user.php">Add User</a>
    <?php
        if(isset($_SESSION['success_message'])){
            echo '<div class="success" >' . $_SESSION['success_message'] . '</div>';
            unset($_SESSION['success_message']);
        }
    ?>
    <div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>Age</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    
                    $query = $conn->prepare("SELECT * FROM user");
                    $query->execute();

                    $result = $query->get_result();

                    foreach( $result as $user){
                        echo '</tr>';
                        echo '<td>' . $user['id'] . '</td>';
                        echo '<td>' . $user['username'] . '</td>';
                        echo '<td>' . $user['first_name'] . '</td>';
                        echo '<td>' . $user['last_name'] . '</td>';
                        echo '<td>' . $user['gender'] . '</td>';
                        echo '<td>' . $user['age'] . '</td>';
                        echo '<td>' . $user['role'] . '</td>';
                        echo '<td><a href="/edit_user.php?id='. $user['id'] . '">Edit</a>
                            <form action="admin_home.php" method="POST">
                            <input type="hidden" name="id" value="' . $user['id'] . '"/>' . 
                            '<button type="submit" name="delete">Delete</button>
                            </form>
                            </td>';
                        echo '</tr>';
                    }

                ?>
            </tbody>
        </table>
    </div>
    <form action="admin_home.php" method="POST">
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

        if(isset($_POST['delete'])){
            
            $id = $_POST['id'];

            $query = $conn->prepare("DELETE FROM user WHERE id = ?");
            $query->bind_param("s", $id);
            $query->execute();

            $query->close();
            $conn->close();

            $_SESSION['success_message'] = "The user has been deleted!";

            header("location: admin_home.php");

            exit();
        }
    ?>
</body>
</html>