<?php
include("dbcon.php");

if (isset($_POST['update'])) {
    $event_id = $_POST['event_id'];
    $event = $_POST['event'];
    $numberofparticipants = $_POST['numberofparticipants'];
    $tournamentmanager = $_POST['tournamentmanager'];

    $sql_update = "UPDATE adminevent SET `event` = '$event', `numberofparticipants` = '$numberofparticipants', `tournamentmanager` = '$tournamentmanager' WHERE id = '$event_id'";
   
    $result_update = mysqli_query($con, $sql_update);

    if ($result_update) {
        header ("location: adminevent.php");
        echo "Event updated successfully.<br/>";
    } else {
        echo "Error updating event: " . mysqli_error($con) . "<br/>";
    }
}

if (isset($_POST['edit'])) {
    $event_id = $_POST['event_id'];

    $query_edit = "SELECT * FROM adminevent WHERE id = '$event_id'";
    $result_edit = mysqli_query($con, $query_edit);

    if (mysqli_num_rows($result_edit) > 0) {
        $row_edit = mysqli_fetch_assoc($result_edit);
        $event = $row_edit['event'];
        $numberofparticipants = $row_edit['numberofparticipants'];
        $tournamentmanager = $row_edit['tournamentmanager'];
    } else {
        echo "Event not found.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>
</head>
<body>

<h2>Edit Event</h2>
<form method="POST" action="">
    <input type="hidden" name="event_id" value="<?php echo $event_id; ?>">
    <label>Event:</label>
    <input type="text" name="event" value="<?php echo $event; ?>" required />
    <br/>
    
    <label>Number of Participants:</label>
    <input type="text" name="numberofparticipants" value="<?php echo $numberofparticipants; ?>" required />
    <br/>
    
    <label>Tournament Manager ID:</label>
    <input type="text" name="tournamentmanager" value="<?php echo $tournamentmanager; ?>" required />
    <br/>
    
    <button type="submit" name="update">Update Event</button>
</form>

</body>
</html>
