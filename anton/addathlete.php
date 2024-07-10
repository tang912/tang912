<?php
require('connection.php');

if (isset($_POST['submit'])) {
    $eventID = mysqli_real_escape_string($con, $_POST['eventID']);
    $deptID = mysqli_real_escape_string($con, $_POST['deptID']);
    $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
    $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
    $middleinit = mysqli_real_escape_string($con, $_POST['middleinit']);
    $course = mysqli_real_escape_string($con, $_POST['course']);
    $year = mysqli_real_escape_string($con, $_POST['year']);
    $civilStatus = mysqli_real_escape_string($con, $_POST['civilstatus']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $birthdate = mysqli_real_escape_string($con, $_POST['birthdate']);
    $contact = mysqli_real_escape_string($con, $_POST['contact']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $coachID = mysqli_real_escape_string($con, $_POST['coachID']);
    $deanID = mysqli_real_escape_string($con, $_POST['deanID']);

    



    $sql = mysqli_query($con, "INSERT INTO athletesprofile (eventID, deptID,lastname,firstname,middleinit,course,year,civilstatus,gender,birthdate,contactNo,address,coachID,deanID) 
                    VALUES ('$eventID', '$deptID', '$lastname','$firstname','$middleinit','$course','$year','$civilStatus','$gender','$birthdate','$contact','$address','$coachID','$deanID')");

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
    <h3>Add Athlete</h3>
    <form method="POST">
        <div>
            <label>Event ID:</label>
            <input type="text" name="eventID">
        </div>
        <div>
            <label>Department ID:</label>
            <input type="text" name="deptID">
        </div>
        <div>
            <label>Lastname:</label>
            <input type="text" name="lastname">
        </div>
        <div>
            <label>Firstname:</label>
            <input type="text" name="firstname">
        </div>
        <div>
            <label>Middle Initial:</label>
            <input type="text" name="middleinit">
        </div>
        <div>
            <label>Course:</label>
            <input type="text" name="course">
        </div>
        <div>
            <label>Year:</label>
            <input type="text" name="year">
        </div>
        <div>
            <label>Civil Status:</label>
            <input type="text" name="civilstatus">
        </div>
        <div>
            <label>Gender:</label>
            <input type="text" name="gender">
        </div>
        <div>
            <label>Birthdate:</label>
            <input type="date" name="birthdate">
        </div>
        <div>
            <label>Contact:</label>
            <input type="text" name="contact">
        </div>
        <div>
            <label>Address:</label>
            <input type="text" name="address">
        </div>
        <div>
            <label>Coach ID:</label>
            <input type="text" name="coachID">
        </div>
        <div>
            <label>Dean ID:</label>
            <input type="text" name="deanID">
        </div>
        <div>
            <button type="submit" name="submit">Save</button>
            <a href="viewevent.php">View Information</a>
        </div>
    </form>
</body>
</html>
