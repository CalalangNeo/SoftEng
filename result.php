<?php

if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['UserLogin'])){ 
    echo "Welcome ".$_SESSION['UserLogin']; 
} else {
    echo  "Welcome Guest";
}

include_once("connections/connections.php");
$con = connect();
$search = $_GET['search'];

$sql = "SELECT * FROM student_list WHERE first_name LIKE '%$search%' || last_name LIKE '%$search%'  ORDER BY id DESC"; 
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

        h1 {
            color: #008000; 
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            max-width: 400px;
            margin: 0 auto 20px;
        }

        input[type="text"],
        button[type="submit"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button[type="submit"] {
            background-color: #008000; 
            color: #fff;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #006400; 
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }

        a {
            text-decoration: none;
            color: #008000; 
        }
    </style>
</head>
<body>
    <h1>PLMUN Student Management System</h1>
    
    <form action="result.php" method="get">
        <input type="text" name="search" id="search">
        <button type="submit">Search</button>
    </form>

    <?php if(isset($_SESSION['UserLogin'])): ?>
        <a href="logout.php">Log-out</a>
    <?php else: ?>
        <a href="login.php">Login</a>
    <?php endif; ?>

    <a href="add.php">Add New</a>

    <table>
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $students->fetch_assoc()): ?>
                <tr>
                    <td><a href="details.php?ID=<?php echo $row['id']; ?>">View</a></td>
                    <td><?php echo $row['first_name']; ?></td>
                    <td><?php echo $row['last_name']; ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
