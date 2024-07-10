<?php
    include("database.php");
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
    <form action="attendance.php" method="GET"> 
        <div>
            <label>Input ID: </label>
            <input type="text" name="id" />
        </div>
    </form>
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

                if(isset($_GET['id'])){
                    $id = $_GET['id'];

                    $query = $conn->prepare("SELECT * FROM registration WHERE id_num = ?");
                    $query->bind_param("s", $id);
                    $query->execute();

                    $result = $query->get_result();

                    if($result->num_rows!=0){
                        foreach($result as $student){
                            echo '<tr>';
                            echo '<td>' . $student['id_num'] . '</td>';
                            echo '<td>' . $student['first_name'] . ' ' . $student['last_name'] . '</td>';
                            echo '<td>' . $student['campus'] . '</td>';
                            echo '<td>' . $student['amount_paid'] . '</td>';
                            if($student['attended'] === 'No'){
                                echo '<td>';
                                echo '<form action="attendance.php" method="POST">';
                                echo '<input type="hidden" name="id" value="' . $student['id_num'] . '"/>';
                                echo '<button name="attend">Attend</button>';
                                echo '</form>';
                            }else{
                                echo '<td>Attended</td>';
                            }
                            echo '</tr>';

                            if($student['attended'] == 'YES'){
                                echo "Student's Attendance RECORD ALREADY EXIST";
                            }
                                
                        }
                    }else{
                        echo '<tr>';
                        echo 'ID is not yet registered!';
                        echo '</tr>';
                    }
                }
                
                if(isset($_POST['attend'])){
                    $id = $_POST['id'];

                    $query = $conn->prepare("UPDATE registration SET attended = 'YES' WHERE id_num = ?");
                    $query->bind_param("s", $id);
                    $query->execute();

                    $query = $conn->prepare("SELECT * FROM registration WHERE id_num = ?");
                    $query->bind_param("s", $id);
                    $query->execute();

                    $result = $query->get_result();

                    $student = $result->fetch_assoc();

                    echo '<tr>';
                    echo '<td>' . $student['id_num'] . '</td>';
                    echo '<td>' . $student['first_name'] . ' ' . $student['last_name'] . '</td>';
                    echo '<td>' . $student['campus'] . '</td>';
                    echo '<td>' . $student['amount_paid'] . '</td>';
                    if($student['attended'] === 'No'){
                        echo '<td>';
                        echo '<form action="attendance.php" method="POST">';
                        echo '<input type="hidden" name="id" value="' . $student['id_num'] . '"/>';
                        echo '<button name="attend">Attend</button>';
                        echo '</form>';
                    }else{
                        echo '<td>Attended</td>';
                    }
                    echo '</tr>';
                                
                    echo "Student Attendance is successfully recorded!";
                }

                

                
            ?>
        </tbody>
    </table>
    
</body>
</html>