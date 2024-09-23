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

$sql = "SELECT * FROM student_list ORDER BY id DESC"; 
$students = $con->query($sql) or die ($con->error);
$row = $students->fetch_assoc();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PLMUN Student Management System</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        h1 {
            color: green;
        }
    </style>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .search-form {
            margin-bottom: 20px;
            text-align: center;
        }

        .search-form input[type="text"] {
            padding: 10px;
            width: 200px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .search-form button {
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        .logout {
            float: right;
            margin-top: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        a {
            text-decoration: none;
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>PLMUN Student Management System</h1>

        <?php if(isset($_SESSION['UserLogin'])): ?>
            <p class="logout"><a href="logout.php">Log-out</a></p>
        <?php else: ?>
            <p class="logout"><a href="login.php">Login</a></p>
        <?php endif; ?>

        <form class="search-form" action="result.php" method="get">
            <input type="text" name="search" id="search" placeholder="Search by First Name">
            <button type="submit">Search</button>
        </form>

        <a href="add.php">Add New</a>

        <table>
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $students->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['first_name']; ?></td>
                        <td><?php echo $row['last_name']; ?></td>
                        <td><a href="details.php?ID=<?php echo $row['id']; ?>">View</a></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>