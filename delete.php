<?php

include_once("connections/connections.php");
$con = connect();

if(isset ($_POST['delete'])){

    $id = $_POST['ID'];
    $sql = "DELETE FROM student_list WHERE id = '$id'";
    $con->query($sql) or die ($con->error);
    echo header ("Location: index.php");
    

}
