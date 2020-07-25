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
    <base href="/">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="./adopt-a-pet/style/adminstyles.css">
</head>

<body>
    <div id="contact" class="container-fluid">
        <div class="row">
            <img src="<?php echo $data['img'] ?>">

            <div>
                <form action="adopt-a-pet/admin/data_insert.php" method="post">
                    <h1>EDIT <strong><?php echo $data['name'] ?></strong> the <?php echo $data['breed'] ?></h1>
                    <label>
                        NAME:<br>
                        <input type="text" name="name" value="<?php echo $data['name'] ?>">
                        <input type="hidden" name="id" value="<?php echo $data['id'] ?>" />
                    </label>
                    <label>
                        BREED:<br>
                        <input type="text" name="breed" value="<?php echo $data['breed'] ?>">
                    </label>
                    <label>
                        LOCATION:<br>
                        <input type="text" name="location" value="<?php echo $data['location'] ?>">
                    </label>
                    <label>
                        IMAGE:<br>
                        <input type="text" name="img" value="<?php echo $data['img'] ?>">
                    </label>
                    <br>
                    <label>
                        TYPE:<br>
                        <select name="type" id="type" value="<?php echo $data['type'] ?>">
                            <option value="1">DOG</option>
                            <option value="2">CAT</option>
                            <option value="3">BIRD</option>
                            <option value="4">FISH</option>
                            <option value="5">RABBIT</option>
                        </select>
                    </label>
                    <br>
                    <label>
                        AGE IN YEARS:<br>
                        <input type="number" name="age" value="<?php echo $data['age'] ?>">
                    </label>
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