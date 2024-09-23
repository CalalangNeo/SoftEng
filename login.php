<?php

if(!isset($_SESSION)){
    session_start();
}

include_once("connections/connections.php");
$con = connect();

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

     $sql = "SELECT * FROM login_users WHERE username = '$username' AND password = '$password'"; 
    

     $user = $con->query($sql) or die ($con->error);
     $row = $user->fetch_assoc();
     $total = $user->num_rows;

     if($total > 0){
        $_SESSION['UserLogin'] = $row['username'];
        $_SESSION['Access'] = $row['access'];
        echo header("Location: index.php");

     }else{
        echo "No user found.";
     }
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
            padding: 0;
        }

        h1 {
            color: #008000;
            text-align: center;
            margin-top: 50px;
            font-family: 'Courier New';
        }

        form {
            width: 300px;
            margin: 0 auto;
            background-color: #f0f0f0; 
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #008000;
        }

        input[type="text"],
        input[type="password"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button[type="login"] {
            width: 100%;
            padding: 10px;
            background-color: #008000;
            border: none;
            border-radius: 5px;
            color: #fff;
            cursor: pointer;
        }

        button[type="login"]:hover {
            background-color: #006400;
        }
    </style>
</head>
<body>
    <h1>PLMUN Admin Login Page</h1>
    <form action="" method="post">
        <label for="username">Username</label>
        <input type="text" name="username" id="username">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <button type="login" name="login">Login</button>
    </form>
</body>
</html>
