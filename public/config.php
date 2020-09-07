<?php 

Define("DB_SERVER", "localhost");
Define("DB_USER", "root");
Define("DB_PASSWORD", "");
Define("DB_NAME", "student_details");

$connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);

if($connect === false){
    die("self: couldn't connect to the database ".mysqli_connect_error());
}

?>