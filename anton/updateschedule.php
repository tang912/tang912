<?php

    require ('connection.php');

    if(isset($_POST['update'])){

        
        $editid = $_GET['editid'];

        $date = $_POST['date'];
        $timeStart = $_POST['timeStart'];
        $timeEnd = $_POST['timeEnd'];
        $event = $_POST['event'];
        $venue = $_POST['venue'];
        $incharge = $_POST['incharge'];
        $counterpart = $_POST['counterpart'];
        
        $sql = mysqli_query($con, "UPDATE schedule SET date='$date',timeStart='$timeStart',timeEnd='$timeEnd',event='$event',venue='$venue',incharge='$incharge',counterpart='$counterpart' WHERE id='$editid'");
        header("location:viewschedule.php");
    }
?>

<html>
    <head>
        <title>Update</title>
    </head>

    <body>
    <h1>UC MAIN INTRAMURALS SYSTEM</h1>
        <h3>Update Record</h3>
        <form method="POST">
        <?php
            $editid = $_GET['editid'];
            $sql = mysqli_query($con, "SELECT * FROM schedule WHERE id='$editid'");
            while($row = mysqli_fetch_array($sql)){
        
        ?>
            <div>
                <label>Date:</label>
                <input type="date" name="date" value="<?php echo $row['date'];?>">
            </div>
            <div>
                <label>Time Start:</label>
                <input type="time" name="timeStart" value="<?php echo $row['timeStart'];?>">
            </div>
            <div>
                <label>Time End:</label>
                <input type="time" name="timeEnd" value="<?php echo $row['timeEnd'];?>">
            </div>
            <div>
                <label>Event:</label>
                <input type="text" name="event" value="<?php echo $row['event'];?>">
            </div>
            <div>
                <label>Venue:</label>
                <input type="text" name="venue" value="<?php echo $row['venue'];?>">
            </div>
            <div>
                <label>In Charge:</label>
                <input type="text" name="incharge" value="<?php echo $row['incharge'];?>">
            </div>
            <div>
                <label>Counterpart:</label>
                <input type="text" name="counterpart" value="<?php echo $row['counterpart'];?>">
            </div>
            <?php
            }
            ?>
            <div>
                <button type="submit" name="update">Save</button>
                <a href="viewschedule.php">View Information</a>
            </div>
        </form>
    </body>
</html>