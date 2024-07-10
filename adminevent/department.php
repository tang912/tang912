<?php
include("dbcon.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department Management</title>
</head>
<body>
<?php

if (isset($_POST['submit'])) {
    
    $deptid = $_POST['deptid'];
    $deptname = $_POST['deptname'];

    
    $sql = "INSERT INTO department (`deptid`, `deptname`) VALUES ('"
        . $deptid . "', '"
        . $deptname . "')";

    
    $result = mysqli_query($con, $sql);

   
    if ($result) {
        echo "New department added successfully.<br/>";
    } else {
        echo "Error: " . mysqli_error($con) . "<br/>";
    }
}

?>

<!-- Department Form -->
<form method="POST" action="department.php">
    <label>Department ID:</label>
    <input type="text" name="deptid" required />
    <br/>
    
    <label>Department Name:</label>
    <input type="text" name="deptname" required />
    <br/>
    
    <button type="submit" name="submit">Submit</button>
</form>

<h2>Registered Departments</h2>
<table border="1">
    <tr>
        <th>Department ID</th>
        <th>Department Name</th>
    </tr>
    <?php
    
    $query = "SELECT deptid, deptname FROM department";
    $result = mysqli_query($con, $query);
    
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>" . $row["deptid"] . "</td>
                    <td>" . $row["deptname"] . "</td>
                </tr>";
        }
    } else {
        echo "<tr><td colspan='2'>No departments found</td></tr>";
    }

  
    mysqli_close($con);
    ?>
</table>

</body>
</html>
