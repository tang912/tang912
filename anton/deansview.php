<?php

    require ('connection.php');

    if(isset($_GET['delid'])){

        $delid = intval($_GET['delid']);

        $sql = mysqli_query($con, "DELETE FROM athletesprofile WHERE id='$delid'");

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

        <a href="addathlete.php">Add Athlete</a> |
        <a href="addevent.php">Add Event</a> |
        <a href="viewevent.php">View Event</a> |
        <a href="adddepartment.php">Add Department</a> |
        <a href="addschedule.php">Add Schedule</a> |
        <a href="viewschedule.php">View Schedule</a> |
        <a href = "approval.php">Athletes Approval</a>
        

        

        <br><br>
       
        <form method="POST" action="">
        <input type="text" name="search" value="<?php echo $search?>">
        <button type="submit">Search</button><br><br>

            <table border = "2px" style = "text-align:center;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>EVENT ID</th>
                        <th bgcolor ="yellow">DEPT ID </th>
                        <th>LAST NAME</th>
                        <th>FIRST NAME</th>
                        <th>MIDDLE INITIAL</th>
                        <th>COURSE</th>
                        <th>YEAR</th>
                        <th>CIVIL STATUS</th>
                        <th>GENDER</th>
                        <th>BIRTHDATE</th>
                        <th>CONTACT NO</th>
                        <th>ADDRESS</th>
                        <th>COACH ID</th>
                        <th>DEANS ID</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                        $sql = "SELECT * FROM athletesprofile";

                        if (!empty($search)) {
                            $search = mysqli_real_escape_string($con, $search);
                            $sql .= " WHERE deptID LIKE '%$search%'";
                        }

                        $result = mysqli_query($con, $sql);
                        $count = 1;
                        $row = mysqli_num_rows($result);

                        if($row > 0)
                            while($row = mysqli_fetch_array($result)){
                    
                    ?>
                    <center>
                    <tr>
                        <td><?php echo $count;?></td>
                        <td><?php echo $row['eventID'];?></td>
                        <td bgcolor= "yellow"><?php echo $row['deptID'];?></td>
                        <td><?php echo $row['lastname'];?></td>
                        <td><?php echo $row['firstname'];?></td>
                        <td><?php echo $row['middleinit'];?></td>
                        <td><?php echo $row['course'];?></td>
                        <td><?php echo $row['year'];?></td>
                        <td><?php echo $row['civilStatus'];?></td>
                        <td><?php echo $row['gender'];?></td>
                        <td><?php echo $row['birthdate'];?></td>
                        <td><?php echo $row['contactNo'];?></td>
                        <td><?php echo $row['address'];?></td>
                        <td><?php echo $row['coachID'];?></td>
                        <td><?php echo $row['deanID'];?></td>
                        
                    </tr>
                    </center>
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