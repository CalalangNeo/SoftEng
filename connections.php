<?php

function connect(){

    $host = "localhost";
$username = "root";
$password = "calalangnea";
$database = "nea";

$con = new mysqli($host, $username, $password, $database);

if($con->connect_error){

    echo $con->connect_error;

}else{

    return $con;
}


}
