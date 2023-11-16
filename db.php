<?php
//connect to database
$host = 'localhost';
$dbname ='gadgex';
$username ='root';
$password ='';

//create a connection to the database
$conn = mysqli_connect($host, $username, $password,$dbname);


//check connection 
if(!$conn){
    die();
}  
else{
    echo "connection stablished." . "<br>";
}

?>
