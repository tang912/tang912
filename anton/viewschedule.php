<?php

    require ('connection.php');

    if(isset($_GET['delid'])){

        $delid = intval($_GET['delid']);

        $sql = mysqli_query($con, "DELETE FROM schedule WHERE id='$delid'");

        if($sql){
            echo "<script>alert('Record Deleted')</script>";
            echo "<script>window.location='viewschedule.php';</script>";
        }else{
            echo "<script>alert('Failed to Delete record')</script>";
        }

    }

    $search = '';

    if(isset($_POST['search'])){
        $search = $_POST['search'];
    }
?>

<html>
    <head>
        <title>UC MAIN INTRAMURALS SYSTEM</title>
    </head>

    <body>
        <hr>
        <h1>UC MAIN INTRAMURALS SYSTEM</h1>
        <hr>
        <a href="loginAdmin.php">logout</a><br>

        <a href="addathlete.php">Add Athlete</a> |
        <a href="addcoach.php">Add Coach</a> |
        <a href="addmanager.php">Add Manager</a> |
        <a href="addevent.php">Add Event</a> |
        <a href="viewevent.php">View Event</a> |
        <a href="adddepartment.php">Add Department</a> |
        <a href="addschedule.php">Add Schedule</a> |
        <a href="viewschedule.php">View Schedule</a> |
        <a href="deansview.php">Dean's View</a> |

       <br><br>
        <form method="POST" action="">
        <input type="text" name="search" value="<?php echo $search?>">
        <button type="submit">Search</button><br><br>

            <table border = "2px" style = "text-align:center;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>DATE</th>
                        <th>TIME START</th>
                        <th>TIME END</th>
                        <th bgcolor = "yellow">EVENT</th>
                        <th>VENUE</th>
                        <th>INCHARGE</th>
                        <th>COUNTERPART</th>

                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                        $sql = "SELECT * FROM schedule";

                        if (!empty($search)) {
                            $search = mysqli_real_escape_string($con, $search);
                            $sql .= " WHERE event LIKE '%$search%'";
                        }

                        $result = mysqli_query($con, $sql);
                        $count = 1;
                        $row = mysqli_num_rows($result);

                        if($row > 0)
                            while($row = mysqli_fetch_array($result)){
                    
                    ?>
                    <tr>
                        <td><?php echo $count;?></td>
                        <td><?php echo $row['date'];?></td>
                        <td><?php echo $row['timeStart'];?></td>
                        <td><?php echo $row['timeEnd'];?></td>
                        <td bgcolor = "yellow"><?php echo $row['event'];?></td>
                        <td><?php echo $row['venue'];?></td>
                        <td><?php echo $row['incharge'];?></td>
                        <td><?php echo $row['counterpart'];?></td>
                        <td>
                            <a href="updateschedule.php?editid=<?php echo htmlentities($row['id']);?>">Update</a>
                            <a href="viewschedule.php?delid=<?php echo htmlentities($row['id']);?>" onClick="return confirm('Do you Really want to delete this Record?');">Delete</a>
                        </td>
                    </tr>
                    <?php 
                     $count = $count + 1;
                    }else {
                        echo "<script>alert('No Records Found')</script>";
                        echo "<script>window.location='viewschedule.php';</script>";
                    }
                    ?>
            </tbody>
            </table>
        </form>
    </body>
</html>