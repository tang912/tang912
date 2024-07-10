<?php
require('connection.php');

if (isset($_POST['submit'])) {
    $date = mysqli_real_escape_string($con, $_POST['date']);
    $timeStart = mysqli_real_escape_string($con, $_POST['timeStart']);
    $timeEnd = mysqli_real_escape_string($con, $_POST['timeEnd']);
    $event = mysqli_real_escape_string($con, $_POST['event']);
    $venue = mysqli_real_escape_string($con, $_POST['venue']);
    $incharge = mysqli_real_escape_string($con, $_POST['incharge']);
    $counterpart = mysqli_real_escape_string($con, $_POST['counterpart']);



    $sql = mysqli_query($con, "INSERT INTO schedule (date,timeStart, timeEnd,event,venue,incharge,counterpart) VALUES ('$date','$timeStart', '$timeEnd','$event','$venue','$incharge','$counterpart')");

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
    <title>Add Schedule</title>
</head>
<body>
    <h3>Add Schedule    </h3>
    <form method="POST">
        <div>
            <label>Date:</label>
            <input type="date" name="date">
        </div>
        <div>
            <label>Time Start :</label>
            <input type="time" name="timeStart">
        </div>
        <div>
            <label>Time End :</label>
            <input type="time" name="timeEnd">
        </div>
        <div>
            <label>Event :</label>
            <input type="text" name="event">
        </div>
        <div>
            <label>Venue :</label>
            <input type="text" name="venue">
        </div>
        <div>
            <label>In Charge :</label>
            <input type="text" name="incharge">
        </div>
        <div>
            <label>Counterpart :</label>
            <input type="text" name="counterpart">
        </div>
        
        <div>
            <button type="submit" name="submit">Save</button>
            <a href="viewevent.php">View Information</a>
        </div>
    </form>
</body>
</html>
