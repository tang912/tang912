<?php
include("dbcon.php");


if (isset($_POST['delete'])) {
    $event_id = $_POST['event_id'];

    $sql_delete = "DELETE FROM tournamentmanager WHERE username = '$event_id'";
    $result_delete = mysqli_query($con, $sql_delete);

    if ($result_delete) {
        echo "Event deleted successfully.";
    } else {
        echo "Error deleting event:";
    }
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
     $mobile = $_POST['mobile'];
    $deptid = $_POST['deptid'];



    $sql = "INSERT INTO tournamentmanager (`username`, `fname`, `lname`, `mobile`, `deptid`) VALUES ('"
        . $username . "', '"
        . $fname . "', '"
        . $lname . "','" . $mobile . "','" . $deptid . "')";

    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "New event added successfully.";
    } else {
        echo "Error: ";
    }
}

if (isset($_POST['search'])) {
    $search_term = $_POST['search_term'];

    $query = "SELECT * FROM tournamentmanager WHERE username LIKE '%$search_term%' OR fname LIKE '%$search_term%' OR lname LIKE '%$search_term%'";
} else {
    $query = "SELECT * FROM tournamentmanager";
}

$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Event Management</title>
</head>
<body>


<form method="POST" action="tournamentmanager.php">
    <label>username:</label>
    <input type="text" name="username"  />
    <br/>
    
    <label>fname:</label>
    <input type="text" name="fname"  />
    <br/>
    
    <label>lname:</label>
    <input type="text" name="lname"  />
    <br/>

    <label>mobile:</label>
    <input type="text" name="mobile"  />
    <br/>

    <label>deptid:</label>
    <input type="number" name="deptid"  />
    <br/>
    
    <button type="submit" name="submit">Add Event</button>
</form>


<form method="POST" action="">
    <label>Search:</label>
    <input type="text" name="search_term" placeholder="Search...">
    <button type="submit" name="search">Search</button>
</form>

<h2>Current Events</h2>
<table border="1">
    <tr>
        <th>username</th>
        <th>fname</th>
        <th>lname</th>
        <th>mobile</th>
        <th>deptid</th>
         <th>edit</th>
        <th>delete</th>
        <th>view</th> <!-- Added View button column -->
    </tr>
    <?php
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>" . $row["username"] . "</td>
                    <td>" . $row["fname"] . "</td>
                    <td>" . $row["lname"] . "</td>
                    <td>" . $row["mobile"] . "</td>
                    <td>" . $row["deptid"] . "</td>
                    
                    <td>
                        <form method='POST' action='update.php'>
                            <input type='hidden' name='event_id' value='" . $row["username"] . "'>
                            <button type='submit' name='edit'>Edit</button>
                        </form>
                    </td>
                   

                    <td>
                        <form method='POST' action=''>
                            <input type='hidden' name='event_id' value='" . $row["username"] . "'>
                            <button type='submit' name='delete' onclick='return confirmDelete()'>Delete</button>
                        </form>
                    </td>
                   
                   
                    <td> 
                        <form method='POST' action='view_event.php'>
                            <input type='hidden' name='event_id' value='" . $row["username"] . "'>
                            <button type='submit' name='view'>View</button>
                        </form>
                    </td>
                </tr>";
     
        }
    } else {
        echo "<tr><td colspan='5'>No events found</td></tr>";
    }
    ?>
</table>

<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this event?");
    }
</script>

</body>
</html>
