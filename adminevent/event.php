<?php
include("dbcon.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Registration</title>
</head>
<body>
<?php

if (isset($_POST['submit'])) {
    
    $eventid = $_POST['eventid'];
    $category = $_POST['category'];
    $noofparticipant = $_POST['noofparticipant'];
    $tournamentmanager = $_POST['tournamentmanager'];

    $sql = "INSERT INTO event (`eventid`, `category`, `noofparticipant`, `tournamentmanager`) VALUES ('"
        . $eventid . "', '"
        . $category . "', '"
        . $noofparticipant . "', '"
        . $tournamentmanager . "')";

    // Execute the query
    $result = mysqli_query($con, $sql);

    // Check if the insertion was successful
    if ($result) {
        echo "New event added successfully.<br/>";
   
    } else {
        echo "Error: " . mysqli_error($con) . "<br/>";
    }
}

?>

<!-- Event Form -->
<form method="POST" action="">
    <label>Event ID:</label>
    <input type="number" name="eventid" required />
    <br/>
    
    <label>Category:</label>
    <select name="category">
    <option value="athletic">athletic</option>
    <option value="cultural">cutural</option>
    <option value="academic">academic</option>
</select>

      <br/>
    
    <label>Number of Participants:</label>
    <input type="number" name="noofparticipant" required />
    <br/>
    
    <label>Tournament Manager:</label>
    <input type="text" name="tournamentmanager" required />
    <br/>
    
    <button type="submit" name="submit">Submit</button>
</form>

<h2>Registered Events</h2>
<table border="1">
    <tr>
        <th>Event ID</th>
        <th>Category</th>
        <th>Number of Participants</th>
        <th>Tournament Manager</th>
    </tr>
    <?php
    
    $query = "SELECT * FROM event";
    $result = mysqli_query($con, $query);
    
    if (mysqli_num_rows($result) > 0) {
        // Output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>" . $row["eventid"] . "</td>
                    <td>" . $row["category"] . "</td>
                    <td>" . $row["noofparticipant"] . "</td>
                    <td>" . $row["tournamentmanager"] . "</td>
                </tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No events found</td></tr>";
    }
    ?>
</table>

</body>
</html>
