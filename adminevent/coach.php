<?php
include("dbcon.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COACH DATA</title>
</head>
<body>
<?php

if (isset($_POST['submit'])) {
    
    $username = $_POST['username'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mobile = $_POST['mobile'];
    $deptid = $_POST['deptid'];

    // Prepare the SQL statement to insert a new tournament manager
    $sql = "INSERT INTO coach (`username`, `fname`, `lname`, `mobile`, `deptid`) VALUES ('"
        . $username . "', '"
        . $fname . "', '"
        . $lname . "', '"
        . $mobile . "', '"
        . $deptid . "')";

    // Execute the query
    $result = mysqli_query($con, $sql);

    // Check if the insertion was successful
    if ($result) {
        echo "New Coach added successfully.<br/>";
    } else {
        echo "Error: " . mysqli_error($con) . "<br/>";
    }
}
?>
<h1>COACH DATA</h1>
<!-- Tournament Manager Form -->
<form method="POST" action="coach.php">
    <label>Username:</label>
    <input type="text" name="username" required />
    <br/>
    
    <label>First Name:</label>
    <input type="text" name="fname" required />
    <br/>
    
    <label>Last Name:</label>
    <input type="text" name="lname" required />
    <br/>
    
    <label>Mobile:</label>
    <input type="text" name="mobile" required />
    <br/>
    
    <label>Department ID:</label>
    <input type="number" name="deptid" required />
    <br/>
    
    <button type="submit" name="submit">ADD NEW</button>
</form>

<h2></h2>
<table border="1">
    <tr>
        <th>Username</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Mobile</th>
        <th>Department ID</th>
    </tr>
    <?php
    
    $query = "SELECT * FROM coach";
    $result = mysqli_query($con, $query);
    
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>" . $row["username"] . "</td>
                    <td>" . $row["fname"] . "</td>
                    <td>" . $row["lname"] . "</td>
                    <td>" . $row["mobile"] . "</td>
                    <td>" . $row["deptid"] . "</td>
                </tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No coach found</td></tr>";
    }
    ?>
</table>

</body>
</html>
