<?php
//host
$host = "localhost";


//dbname
$dbname = "auth-sys";


//user
$user ="root";

//pass
$pass ="";


$conn = new PDO("mysql:host=$host;dbname=$dbname;",$user,$pass);
/*
if($conn==true){
    echo 'connected';
} else{
    echo"wrong connectioon";
}*/


$servername = "localhost";
$username = "root";
?>