<?php
ob_start();
session_start();
require_once '../login/dbconnect.php';

// if session is not set this will redirect to login page
if( !isset($_SESSION['user' ]) ) {
 header("Location: index.php");
 exit;
}
// select logged-in users details
$res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['user']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
?>


<!doctype html>
<html lang="en">

<head>
    <title>ADOPT A PET</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="../style/userstyles.css">
</head>

<body>

    <nav>
        <ul>
            <li><strong><?php echo $userRow['userName' ]; ?></strong></li>
            
            <li><a href="../login/logout.php?logout">LOGOUT</a></li>
        </ul>
        <h1>WELCOME <strong><span><?php echo $userRow['userName' ]; ?></span></strong></h1>
    </nav>


    <div class="">

        <div class="animalscontainer">
            <!-- php code for displaying cars from the database -->
            <?php
        require_once 'dbconnect.php';


        while($row = mysqli_fetch_assoc($result)) {
            echo("
            <div  id=\"". $row["id"] ."\" class=\"animal\">
              <img src=\"" . $row["img"] ."\">
              <h4><strong>" . $row["name"] . "</strong> " . $row["breed"] . "</h4>
              <h5>



              <br>
              <i style=\"font-size:15px\" class=\"fa\">&#xf276;</i> " . $row["location"] . "</h5><h5>");

              if ($row["age"] < 2) {
                echo ("JUNIOR");}

              elseif ($row["age"] <= 8) {
                echo ("GROWNUP");}

              elseif ($row["age"] > 8) {
                echo ("SENIOR");}

            
                    echo("<br>" . $row["age"] . " years old <br>" . $row["description"] . " <br>" . $row["hobbies"] . " </h5><br>
                <button id=\"". $row["id"] ."myBtn\">BOOK</button>
              
                <div id=\"". $row["id"] ."slider\" style=\"display:none\" class=\"slider\">

                <!-- Modal content -->
                <div class=\"modal-content\">
                <span class=\"close close". $row["id"] ."\">&times;</span>
                  <div class=\"modal-body\">
                  <img src=\"" . $row["img"] ."\">
                  <div class=\"content\">
                    <h1><strong>" . $row["breed"] . "</strong> <span>" . $row["name"] . "</span></h1>
                    <p>
                      <h5><br>");

                      
                    
                            echo("</h5><br>
                      <i style=\"font-size:15px\" class=\"fa\">&#xf276;</i> " . $row["location"] . "<br><br>
                      <h5>");

                      if ($row["age"] < 2) {
                        echo ("JUNIOR");}
    
                      elseif ($row["age"] <= 8) {
                        echo ("GROWNUP");}
    
                      elseif ($row["age"] > 8) {
                        echo ("SENIOR");}

                    
                            echo("<br>" . $row["age"] . " years old</h5>
                      <button>SEND REQUEST</button>
                    </p>
                  </div>  
                  </div>
                </div>
              

          </div>
          </div>
          <script>
                  // Get the modal
                  var modal". $row["id"] ." = document.getElementById(\"". $row["id"] ."slider\");

                  // Get the button that opens the modal
                  var btn = document.getElementById(\"". $row["id"] ."myBtn\");

                  // Get the <span> element that closes the modal
                  var span". $row["id"] ." = document.getElementsByClassName(\"close". $row["id"] ."\")[0];

                  // When the user clicks the button, open the modal 
                  btn.onclick = function() {
                    modal". $row["id"] .".style.display = \"flex\";
                  }

                  // When the user clicks on <span> (x), close the modal
                  span". $row["id"] .".onclick = function() {
                    modal". $row["id"] .".style.display = \"none\";
                  }

                  // When the user clicks anywhere outside of the modal, close it
                  window.onclick = function(event) {
                    if (event.target == modal) {
                      modal". $row["id"] .".style.display = \"none\";
                    }
                  }
                </script>");
          }
          


           // Free result set
          mysqli_free_result($result);
      ?>


        </div>

        </div>
    </div>

</body>

</html>
<?php ob_end_flush(); ?>