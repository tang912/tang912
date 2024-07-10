<?php
require('connection.php');

if (isset($_POST['submit'])) {
    $event = mysqli_real_escape_string($con, $_POST['event']);
    $participants = mysqli_real_escape_string($con, $_POST['participant']);
    $manager = mysqli_real_escape_string($con, $_POST['manager']);



    $sql = mysqli_query($con, "INSERT INTO event (event, participant, manager) VALUES ('$event', '$participants', '$manager')");

    // Check for SQL errors
    if (!$sql) {
        echo "Error: " . mysqli_error($con);
        exit;
    }

    if (mysqli_affected_rows($con) > 0) {
        echo "<script>alert('New Record Added')</script>";
        echo "<script>window.location='viewevent.php';</script>";
    } else {
        echo "<script>alert('Failed to Add record')</script>";
    }
}
?>

<html>
<head>
    <title>Add Record</title>
</head>
<body>
<h1>UC MAIN INTRAMURALS SYSTEM</h1>
    <h3>Add Event</h3>
    <form method="POST">
        <div>
            <label>Event:</label>
            <input type="text" name="event">
        </div>
        <div>
            <label>No. of Participants:</label>
            <input type="text" name="participant">
        </div>
        <div>
            <label>manager:</label>
            <input type="text" name="manager">
        </div>
        <div>
            <button type="submit" name="submit">Save</button>
            <a href="viewevent.php">View Information</a>
        </div>
    </form>
</body>
</html>
