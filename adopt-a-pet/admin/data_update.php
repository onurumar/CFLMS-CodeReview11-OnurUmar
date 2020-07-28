<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cr11_onurumar_petadoption";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_GET['id']) {
   $id = $_GET['id'];

   $sql = "SELECT * FROM animal WHERE id = {$id}" ;
   $result = $conn->query($sql);

   $data = $result->fetch_assoc();

   $conn->close();

?>
<!DOCTYPE html>

<head>
    <title>ADOPT A PET</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="../style/adminstyles.css">
</head>

<body>
    <div id="contact" class="container-fluid">
        <div class="row">
            <img src="<?php echo $data['img'] ?>">

            <div>
                <form action="data_insert.php" method="post">
                    <h1>EDIT <strong><?php echo $data['name'] ?></strong></h1>
                    <label>
                        NAME:<br>
                        <input type="text" name="name" value="<?php echo $data['name'] ?>">
                        <input type="hidden" name="id" value="<?php echo $data['id'] ?>" />
                    </label>
                    
                    <label>
                        LOCATION:<br>
                        <input type="text" name="location" value="<?php echo $data['location'] ?>">
                    </label>
                    <label>
                        IMAGE:<br>
                        <input type="text" name="img" value="<?php echo $data['img'] ?>">
                    </label>
                    
                    <label>
                        AGE IN YEARS:<br>
                        <input type="number" name="age" value="<?php echo $data['age'] ?>">
                    </label>

                     <br>

                        <label>
                                DESCRIPTION: <br>
                                <input type="text" name="description" value="<?php echo $data['description'] ?>">
                              </label>
                              <br>

                              <label>
                                HOBBIES:<br>
                                <input type="text" name="hobbies" value="<?php echo $data['hobbies'] ?>">
                              </label>
                              <br>


                    <br>
                    <input type="submit" class="btn" value="CHANGE">
                </form>
            </div>
        </div>
    </div>

</body>

</html>

<?php
}
?>