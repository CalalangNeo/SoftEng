<?php
include_once("connections/connections.php");
$con = connect();

if(isset($_POST['submit'])){
    $fname = mysqli_real_escape_string($con, $_POST['firstname']);
    $lname = mysqli_real_escape_string($con, $_POST['lastname']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);

    $sql = "INSERT INTO `student_list`(`first_name`, `last_name`, `Gender`) VALUES ('$fname','$lname','$gender')";
    
    // Execute the query
    if ($con->query($sql) === TRUE) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}

// Close the database connection
$con->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PLMUN Student Management System</title>
    <style>
        /* Your CSS styles */
    </style>
</head>
<body>
    <form action="" method="post">
        <label for="firstname">First Name</label>
        <input type="text" name="firstname" id="firstname">

        <label for="lastname">Last Name</label>
        <input type="text" name="lastname" id="lastname">

        <label for="gender">Gender</label>
        <select name="gender" id="gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>

        <input type="submit" name="submit" value="Submit Form">
    </form>
</body>
</html>
