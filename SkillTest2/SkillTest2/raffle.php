<?php
    session_start();
    include("database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="raffle.css" />
    <title>Document</title>
</head>
<body>
     <div>
        <form action="raffle.php" method="POST">
            <div class="filter">
                <label>Set Files Here: </label>
                <div>
                    <input type="radio" name="campus" value="All" checked="checked"/>
                    <label>All</label>
                </div>
                <div>
                    <input type="radio" name="campus" value="Main"/>
                    <label>Main</label>
                </div>
                <div>
                    <input type="radio" name="campus" value="LM"/>
                    <label>LM</label>
                </div>
                <div>
                    <input type="radio" name="campus" value="Banilad"/>
                    <label>Banilad</label>
                </div>
            </div>
            <button name="raffle">Reveal the Lucky Winner</button>
        </form>
        <table>
            <thead>
                <tr>
                    <th>ID #</th>
                    <th>Name</th>
                    <th>Campus</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(isset($_POST['raffle'])){
                        $campus = $_POST["campus"];
                        
                        if($campus === 'Main'){

                            $query = $conn->prepare("SELECT * FROM registration WHERE campus = 'Main Campus'");
                            $query->execute();

                            $result = $query->get_result();

                            $count = $result->num_rows;

                            $random = rand(1, $count);

                            $num = 1;
                            foreach($result as $student){
                                if($num === $random){
                                    echo '<tr>';
                                    echo '<td>' . $student['id_num'] . '</td>';
                                    echo '<td>' . $student['first_name'] . ' ' . $student['last_name'] . '</td>';
                                    echo '<td>' . $student['campus'] . '</td>';
                                    echo '</tr>';
                                    break;
                                }else{
                                    $num++;
                                }                 
                            }

                        }else if($campus === 'LM'){

                            $query = $conn->prepare("SELECT * FROM registration WHERE campus = 'LM'");
                            $query->execute();

                            $result = $query->get_result();

                            $count = $result->num_rows;

                            $random = rand(1, $count);

                            $num = 1;
                            foreach($result as $student){
                                if($num === $random){
                                    echo '<tr>';
                                    echo '<td>' . $student['id_num'] . '</td>';
                                    echo '<td>' . $student['first_name'] . ' ' . $student['last_name'] . '</td>';
                                    echo '<td>' . $student['campus'] . '</td>';
                                    echo '</tr>';
                                    break;
                                }else{
                                    $num++;
                                }                 
                            }
                            
                        }else if($campus === 'Banilad'){

                            $query = $conn->prepare("SELECT * FROM registration WHERE campus = 'Banilad'");
                            $query->execute();

                            $result = $query->get_result();

                            $count = $result->num_rows;

                            $random = rand(1, $count);

                            $num = 1;
                            foreach($result as $student){
                                if($num === $random){
                                    echo '<tr>';
                                    echo '<td>' . $student['id_num'] . '</td>';
                                    echo '<td>' . $student['first_name'] . ' ' . $student['last_name'] . '</td>';
                                    echo '<td>' . $student['campus'] . '</td>';
                                    echo '</tr>';
                                    break;
                                }else{
                                    $num++;
                                }                 
                            }
                            
                        }else{

                            $query = $conn->prepare("SELECT * FROM registration");
                            $query->execute();

                            $result = $query->get_result();

                            $count = $result->num_rows;

                            $random = rand(1, $count);

                            $num = 1;
                            foreach($result as $student){
                                if($num === $random){
                                    echo '<tr>';
                                    echo '<td>' . $student['id_num'] . '</td>';
                                    echo '<td>' . $student['first_name'] . ' ' . $student['last_name'] . '</td>';
                                    echo '<td>' . $student['campus'] . '</td>';
                                    echo '</tr>';
                                    break;
                                }else{
                                    $num++;
                                }                 
                            }

                        }
                        echo "CONGRATULATIONS!";
                    }
                    
                    
                ?>
            </tbody>
        </table>
    </div>
    
</body>
</html>