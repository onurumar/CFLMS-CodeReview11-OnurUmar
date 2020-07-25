<?php
ob_start();
session_start();
require_once '../login/dbconnect.php';


// if session is not set this will redirect to login page

 if(isset($_SESSION["user"])){
   header("Location: user.php");
   exit;
 }
// select logged-in users details
$res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['admin']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
?>


<!doctype html>
<html lang="en">

<head>
    <title>ADOPT A PET</title>
    <base href="/">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="./adopt-a-pet/style/adminstyles.css">
</head>

<body>

    <nav>
        <ul>
            <li><strong><?php echo $userRow['userName']; ?></strong></li>
            <li><a href="./adopt-a-pet/login/logout.php?logout">LOGOUT</a></li>
        </ul>
        <h1>WELCOME <strong><span><?php echo $userRow['userName']; ?></span></strong></h1>
    </nav>


    <div class="">

        <div class="animalscontainer">
            <!-- php code for displaying cars from the database -->
            <?php
        require_once 'dbconnect.php';


        while($row = mysqli_fetch_assoc($result)) {
            echo("
            <div  id=\"". $row["id"] ."\" class=\"animal\">
            <div>
              <a href=\"adopt-a-pet/admin/data_update.php\" target=\"popup\" onclick=\"window.open('../adopt-a-pet/admin/data_update.php?id=". $row["id"] . "','name','width=600,height=800')\" class=\"edit\">
              <i style=\"font-size:24px\" class=\"fa\">&#xf044;</i>
              </a>
            </div>
            <div>
              <a class=\"delete\" href=\"adopt-a-pet/admin/delete.php\" target=\"popup\" onclick=\"window.open('../adopt-a-pet/admin/delete.php?id=". $row["id"] . "','name','width=600,height=800')\">
              <i style=\"font-size:24px\" class=\"fa\">&#xf1f8;</i>
              </a>
            </div>
              <img src=\"" . $row["img"] ."\">
              <h4><strong>" . $row["name"] . "</strong> " . $row["breed"] . "</h4>
              <h5>");

              if ($row["type"] == 1) {
                echo ("DOG");}

              if ($row["type"] == 2) {
                echo ("CAT");}

              if ($row["type"] == 3) {
                echo ("BIRD");}
              
              if ($row["type"] == 4) {
                echo ("FISH");}

              if ($row["type"] == 5) {
                echo ("RABBIT");}
            
                    echo("<br>
              <i style=\"font-size:15px\" class=\"fa\">&#xf276;</i> " . $row["location"] . "</h5><h5>");

              if ($row["age"] < 2) {
                echo ("JUNIOR");}

              elseif ($row["age"] <= 8) {
                echo ("GROWNUP");}

              elseif ($row["age"] > 8) {
                echo ("SENIOR");}

          
          echo ("<br>" . $row["age"] . " years old</h5></div>");
              }
          


           // Free result set
          mysqli_free_result($result);
      ?>
            <div class="addanimal">
                <span><a href="day02/admin/update.php" target="popup"
                            onclick="window.open('../adopt-a-pet/admin/update.php','name','width=600,height=990')">+<br>ADD<br>ANIMAL</a></span>
                </div>
            </div>


        </div>

        </div>
    </div>

</body>

</html>
<?php ob_end_flush(); ?>