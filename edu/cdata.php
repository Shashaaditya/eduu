<?php
$servername = 'localhost';
$username = 'root';
$password = '';

$conn = new mysqli($servername, $username, $password );
if($conn->connect_error){
    die("Connection to database failed ".$conn->connect_error);
}
$sql = "CREATE DATABASE edu";
if($conn->query($sql) === true){
    echo("Database created sucessfully");

} else{
    echo("Database not created");
}
echo("The database Connected Successfully");
?>