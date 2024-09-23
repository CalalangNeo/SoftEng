<?php

if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['Access']) && $_SESSION['Access'] == "admin"){ 
    echo "Welcome ".$_SESSION['UserLogin']."<br/>"; 
} else {
echo header("LOcation: index.php"); 
}

include_once("connections/connections.php");
$con = connect();
$id = $_GET['ID'];

$sql = "SELECT * FROM student_list WHERE id = '$id'"; 
$students = $con->query($sql) or die ($con->error);
$row = $students->fetch_assoc();


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

        a {
            text-decoration: none;
            color: #008000; 
            margin-right: 10px;
        }

        form {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        button[type="submit"] {
            padding: 10px 20px;
            background-color: #008000; 
            border: none;
            border-radius: 5px;
            color: #fff;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #006400;
        }

        h2 {
            color: #008000; 
            margin-bottom: 10px;
        }

        p {
            color: #333; 
        }
    </style>
</head>
<body>
    <form action="delete.php" method="post">
        <a href="index.php"> <-Back</a>
        <a href="edit.php?ID=<?php echo $row['id'];?>">Edit</a> 
        <?php if($_SESSION['Access'] == "admin"): ?>
            <button type="submit" name="delete">Delete</button>
        <?php endif; ?>  
        <input type="hidden" name="ID" value="<?php echo $row['id'];?>">
    </form>
    <br>
    <h2><?php echo $row['first_name'];?> <?php echo $row['last_name'];?></h2>
    <p>is a <?php echo $row['Gender'];?> </p>
</body>
</html>
