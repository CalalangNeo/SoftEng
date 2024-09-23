<?php

include_once("connections/connections.php");
$con = connect();
$id = $_GET['ID'];

$sql = "SELECT * FROM student_list WHERE id = '$id'"; 
$students = $con->query($sql) or die ($con->error);
$row = $students->fetch_assoc();

if(isset($_POST['submit'])){

   echo $fname = $_POST['firstname'];
   echo $lname = $_POST['lastname'];
   echo  $gender = $_POST['gender'];

$sql = "UPDATE student_list SET first_name = '$fname', last_name = '$lname', gender = '$gender' WHERE id = '$id'";
$con->query($sql) or die ($con->error);

echo header("location: details.php?ID=".$id);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PLMUN Student Management System</title>
    <style>
        
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
        }

        form {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #008000; 
        }

        input[type="text"],
        input[type="password"],
        select {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #008000; 
            border: none;
            border-radius: 5px;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #006400; 
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <label for="firstname">First Name</label>
        <input type="text" name="firstname" id="firstname" value="<?php echo $row['first_name'];?>">

        <label for="lastname">Last Name</label>
        <input type="text" name="lastname" id="lastname" value="<?php echo $row['last_name'];?>">

        <label for="gender">Gender</label>
        <select name="gender" id="gender">
            <option value="Male" <?php echo ($row['Gender'] == "Male") ? 'selected' : ''; ?>>Male</option>
            <option value="Female" <?php echo ($row['Gender'] == "Female") ? 'selected' : ''; ?>>Female</option>
        </select>

        <input type="submit" name="submit" value="Update">
    </form>
</body>
</html>
