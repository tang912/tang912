<?php

    require ('connection.php');

    if(isset($_GET['delid'])){

        $delid = intval($_GET['delid']);

        $sql = mysqli_query($con, "DELETE FROM event WHERE id='$delid'");

        if($sql){
            echo "<script>alert('Record Deleted')</script>";
            //echo "<script>window.location='read.php';</script>";
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
        <h1>UC MAIN INTRAMURALS SYSTEM</h1>
        <a href="loginAdmin.php">logout</a><br>

       | <a href="addathlete.php">Add Athlete</a> |
        <a href="addcoach.php">Add Coach</a> |
        <a href="addmanager.php">Add Manager</a> |
        <a href="addevent.php">Add Event</a> |
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
                        <th bgcolor = "yellow">EVENT</th>
                        <th>No. of Participants</th>
                        <th>Tournament Manager</th>
                       
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                        $sql = "SELECT * FROM event";

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
                        <td bgcolor ="yellow"><?php echo $row['event'];?></td>
                        <td><?php echo $row['participant'];?></td>
                        <td><?php echo $row['manager'];?></td>
                        <td>
                            <a href="updateevent.php?editid=<?php echo htmlentities($row['id']);?>">Update</a> |
                            <a href="viewevent.php?delid=<?php echo htmlentities($row['id']);?>" onClick="return confirm('Do you Really want to delete this Record?');">Delete</a>
                        </td>
                    </tr>
                    <?php 
                     $count = $count + 1;
                    }else {
                        echo "<script>alert('No Records Found')</script>";
                        echo "<script>window.location='viewevent.php';</script>";
                    }
                    ?>
            </tbody>
            </table>
        </form>
    </body>
</html>