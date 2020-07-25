<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cr11_onurumar_petadoption";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_POST) {
   $id = $_POST['id'];

   $sql = "DELETE FROM animal WHERE id = {$id}";
    if($conn->query($sql) === TRUE) {
            echo "<script type=\"text/javascript\">
            setTimeout(
                function ()
            {
              self.close();
            }, 3000 );
            
              </script><div style=\"display:flex;justify-content:center;align-itmes:center;flex-direction:column;\"><img id=\"successimg\" style=\"object-fit:contain;\" src=\"https://www.healthifyme.com/blog/wp-content/uploads/2019/07/success_400x300.gif\"></div>";
              } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }

   $conn->close();
}

?>