<?php
    session_start();

    include("database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="register_student.php" method="POST">
        <div>
            <label>Student Id</label>
            <input type="text" name="studentId" />
        </div>
        <div>
            <label>Campus</label>
            <select name="campus">
                <option value="Main Campus">Main Campus</option>
                <option value="LM">LM</option>
                <option value="Banilad">Banilad</option>
            </select>
        </div>
        <div>
            <label>First name</label>
            <input type="text" name="firstName" />
        </div>
        <div>
            <label>Last Name</label>
            <input type="text" name="lastName" />
        </div>
        <div>
            <label>Amount Paid</label>
            <input type="text" name="amountPaid" />
        </div>
        <button name="register">Register</button>
    </form>
    <?php
        
        if(isset($_POST['register'])){

            $studentId = $_POST['studentId'];
            $campus = $_POST['campus'];
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $amountPaid = $_POST['amountPaid'];

            $query = $conn->prepare("INSERT INTO registration(id_num, campus, first_name, last_name, amount_paid, attended) VALUES(?,?,?,?,?,'No')");
            $query->bind_param("sssss", $studentId, $campus, $firstName, $lastName, $amountPaid);
            $query->execute();

            $query->close();
            $conn->close();

            $_SESSION['success_message'] = "New student has been addded!";

            header("location: registration.php");

            exit();

        }
    ?>
</body>
</html>