<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cr11_onurumar_petadoption";

$conn = mysqli_connect($servername, $username, $password, $dbname);
    
$sql = "SELECT * FROM animal WHERE 1";

$result = mysqli_query($conn, $sql);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



?>