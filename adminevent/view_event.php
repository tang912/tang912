<?php
include("dbcon.php");

if (isset($_POST['event_id'])) {
    $event_id = $_POST['event_id'];

    $query = "SELECT * FROM adminevent WHERE id = '$event_id'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo "<h1>Event Details</h1>";
        echo "<table border='1'>";
        echo "<tr>
                <th>Event</th>
                    <th>Number of Participants</th>
                          <th>Tournament Manager ID</th>
             </tr>";
      
        echo "<tr>";
        echo "<td>" . $row['event'] . "</td>";
        echo "<td>" . $row['numberofparticipants'] . "</td>";
        echo "<td>" . $row['tournamentmanager'] . "</td>";
        echo "</tr>";
        echo "</table>";
   
    } else {
        echo "Event not found.";
    }
} else {
    echo "Invalid request.";
}
?>
