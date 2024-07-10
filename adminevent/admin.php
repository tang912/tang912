<?php
include ("dbcon.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    
</head>
<body>
    <h1>Welcome, Admin!</h1>
    <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
                <div class="position-sticky">
                <ul class="nav flex-column">

                    <li class="nav-item">
                    <a class="nav-link active" href="department.php">
                      department
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="department.php">
                        event
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="adminevent.php">
                        Event Admin
                </li>
            </ul>
        </div>
    </nav>
<form action="registration.php" method="post">
                        <button type="submit" name="logout" class="btn btn-primary">Logout</button>
</form>
</body>
</html>
