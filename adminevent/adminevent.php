<?php 
    include ("dbcon.php");

    if(isset($_POST['delete'])) {
        $event_id = $_POST['event_id'];

    $sql_delete = "DELETE FROM adminevent WHERE id ='$event_id'";
    $result_delete = mysqli_query($con, $sql_delete);

        if($result_delete){
            echo "successfully deleted";

        }else{
            echo "error";
        }
    }

if(isset($_POST['submit'])){
    $event = $_POST['event'];
    $numberofparticipants = $_POST['numberofparticipants'];
    $tournamentmanager = $_POST['tournamentmanager'];

$sql = "INSERT INTO adminevent (`event`, `numberofparticipants`, `tournamentmanager`) VALUES ('" . $event . "','" . $numberofparticipants . "','" . $tournamentmanager . "')";

    $result = mysqli_query($con, $sql);

    if($result){
        echo "successfully added";

    }else{
        echo "Error";
    }
}

if (isset($_POST['search'])) {
    $search_term = $_POST['search_term'];

    $query = "SELECT * FROM adminevent WHERE event LIKE '%$search_term%' OR numberofparticipants LIKE '%$search_term%' OR tournamentmanager LIKE '%$search_term%'";
}else{
        $query = "SELECT * FROM adminevent";
}
    $result = mysqli_query($con, $query);
?>

<!Doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" name="content=device-width,
        initial-scale=1.0">
        <title>Event</title>
    </head>

<body>
    <form method="POST" action="adminevent.php">
    <label>EVENT</label>
    <input type="text" name="event" required /></br>

     <label>NumberofParticipants</label>
    <input type="text" name="numberofparticipants" required /></br>

    <label>manager</label>
    <input type="text" name="tournamentmanager" required /></br>

   

    <button type="submit" name="submit">ADD</button>
</form>

    <form method="POST" action="">
    <input type="text" name="search_term" placeholder="search...">
    <button type="submit" name="search">search</button>
</form>

<h2>Data</h2>
<table border="2">
    <tr>
        <th>EVENT</th>
        <th>PARTICIPANTS</th>
        <th>MANAGER</th>
        <th>edit</th>
        <th>delete</th>
        <th>view</th>
    </tr>

<?php
    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>
                    <td>" . $row["event"] . "</td>
                    <td>" . $row["numberofparticipants"] ."</td>
                    <td>" . $row["tournamentmanager"] . "</td>

                    <td>
                        <form method='POST' action='edit_event.php'>
                        <input type='hidden' name='event_id' value='" . $row["id"] . "'>
                    <button type='submit' name='edit'>edit</button>
                    </form>
                    </td>

                <td>
                    <form method='POST' action=''>
                        <input type='hidden' name='event_id' value='" . $row["id"] . "'>
                    
                    <button type='submit' name='delete' onclick='return confirmDelete()'>delete</button>
                  </form>
                    </td>

             <td>
                        <form method='POST' action='view_event.php'>
                        <input type='hidden' name='event_id' value='" . $row["id"] . "'>
                    <button type='submit' name='view'>view</button>
                    </form>
                    </td>


                </tr>";

        }
  }else{
    echo "<tr><td colspan='5'>no events found</td></tr>";

}
?>

</table>


<script>
    function confirmDelete(){
            return confirm("are you sure you want to delete this?");
    }
</script>
</body>
</html>
        
            <br><br>


