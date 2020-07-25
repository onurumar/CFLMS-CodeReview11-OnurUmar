<?php
ob_start();
session_start();
require_once '../login/dbconnect.php';


// select logged-in users details
$res=mysqli_query($conn, "SELECT * FROM users ".$_SESSION['superadmin']);
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
        <h1>THIS IS JUST FOR CREATING <strong><span>ADMIN ACCOUNTS</span></strong></h1>
    </nav>


    <div class="">

        <div class="animalscontainer">
            <!-- php code for displaying cars from the database -->
            <?php
        require_once 'dbconnect.php';


        while($row = mysqli_fetch_assoc($result)) {
            echo("
            <div  id=\"". $userRow["userId"] ."\" class=\"animal\">
            <div>
              <a href=\"adopt-a-pet/admin/data_update.php\" target=\"popup\" onclick=\"window.open('../adopt-a-pet/admin/data_update.php?id=". $userRow["id"] . "','name','width=600,height=800')\" class=\"edit\">
              <i style=\"font-size:24px\" class=\"fa\">&#xf044;</i>
              </a>
            </div>
            <div>
              <a class=\"delete\" href=\"adopt-a-pet/admin/delete.php\" target=\"popup\" onclick=\"window.open('../adopt-a-pet/admin/delete.php?id=". $userRow["id"] . "','name','width=600,height=800')\">
              <i style=\"font-size:24px\" class=\"fa\">&#xf1f8;</i>
              </a>
            </div>
              <img src=\"\">
              <h4><strong>" . $userRow["userName"] . "</strong> " . $userRow["status"] . "</h4></div>");
              }
          


           // Free result set
          mysqli_free_result($result);
      ?>
            <div class="animal">
                <span><a href="day02/admin/update.php" target="popup"
                            onclick="window.open('../adopt-a-pet/admin/update.php','name','width=600,height=990')">+<br>ADD<br>USER</a></span>
                </div>
            </div>


        </div>

        </div>
    </div>

</body>

</html>
<?php ob_end_flush(); ?>