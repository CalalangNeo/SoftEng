<?php

function connect(){

    $host = "localhost";
$username = "root";
$password = "";
$database = "per_year_database_table.sql";

$con = new mysqli($host, $username, $password, $database);

if($con->connect_error){

    echo $con->connect_error;

}else{

    return $con;
}


}
