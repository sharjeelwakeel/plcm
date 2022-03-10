<?php
define("SERVER","localhost");
define("USER","root");
define("PASSWORD",'');
define("DATABASE",'product_lifecycle_managment');
$conn = new mysqli(SERVER, USER, PASSWORD, DATABASE);
 
if ($conn->connect_errno) {
    echo "Error: " . $conn->connect_error;
}




?>
