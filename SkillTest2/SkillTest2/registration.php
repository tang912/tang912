<?php
    session_start();
    include("database.php");
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
            unset($_SESSION['sucess_message']);
        }
    ?>
    <div>
        <a href="register_student.php">Register a student here</a>
        <span>|</span>
        <a href="index.php">Back to menu</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID #</th>
                <th>Name</th>
                <th>Campus</th>
                <th>Amount</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php

                $query = $conn->prepare("SELECT * FROM registration");
                $query->execute();

                $result = $query->get_result();

                foreach($result as $student){
                    echo '<tr>';
                    echo '<td>' . $student['id_num'] . '</td>';
                    echo '<td>' . $student['first_name'] . ' ' . $student['last_name'] . '</td>';
                    echo '<td>' . $student['campus'] . '</td>';
                    echo '<td>' . $student['amount_paid'] . '</td>';
                    echo '<td><button>Edit</button><button>Delete</button></td>';
                }
            ?>
        </tbody>
    </table>
</body>
</html>