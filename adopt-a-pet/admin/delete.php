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
<html lang="en">
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
        <form class="deleteform" action="deletingdata.php" method="post">
          <h1>ARE YOU SURE YOU WANT TO DELETE THIS ANIMAL?</h1><br>
          <input type="hidden" name= "id" value="<?php echo $data['id'] ?>" />
            <button type="submit">Yes, delete it!</button >
            <a href="index.php"><button type="button">No, go back!</button ></a>
        </form>
      </div>
    </div>
  </div>

</body>
</html>
<?php
}
?>