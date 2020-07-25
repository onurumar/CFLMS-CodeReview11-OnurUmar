<?php
ob_start();
session_start();
require_once 'dbconnect.php';

// it will never let you open index(login) page if session is set
if ( isset($_SESSION['user' ])!="" ) {
 header("Location: ./admin/user.php");
 exit;
}
if ( isset($_SESSION['admin' ])!="" ) {
 header("Location: ./admin/admin.php");
 exit;
}
if ( isset($_SESSION['superadmin' ])!="" ) {
    header("Location: ./admin/superadmin.php");
    exit;
   }

$error = false;

if( isset($_POST['btn-login']) ) {

  // prevent sql injections/ clear user invalid inputs
 $email = trim($_POST['email']);
 $email = strip_tags($email);
 $email = htmlspecialchars($email);

 $pass = trim($_POST[ 'pass']);
 $pass = strip_tags($pass);
 $pass = htmlspecialchars($pass);
 // prevent sql injections / clear user invalid inputs

 if(empty($email)){
  $error = true;
  $emailError = "Please enter your email address.";
 } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
  $error = true;
  $emailError = "Please enter valid email address.";
 }

 if (empty($pass)){
  $error = true;
  $passError = "Please enter your password." ;
 }

 // if there's no error, continue to login
 if (!$error) {
  
    $password = hash( 'sha256', $pass); // password hashing
  
    $res=mysqli_query($conn, "SELECT * FROM users WHERE userEmail='$email'" );
    $row=mysqli_fetch_array($res, MYSQLI_ASSOC);
    $count = mysqli_num_rows($res); // if uname/pass is correct it returns must be 1 row
   
    if( $count == 1 && $row['userPass' ]==$password ) {
      if($row["status"] == 'admin'){
        $_SESSION["admin"] = $row["userId"];
        header("Location: ./admin/admin.php");
     
  
      }
      if($row["status"] == 'superadmin'){
        $_SESSION["superadmin"] = $row["userId"];
        header("Location: ./admin/superadmin.php");
     
  
      } 
      if($row["status"] == 'user'){
        $_SESSION["user"] = $row["userId"];
        header("Location: ./admin/user.php");
      }
     
    } else {
     $errMSG = "Incorrect Credentials, Try again..." ;
    }
   
   }

}
?>
<!doctype html>
<html lang="en">

<head>
    <title>ADOPT-A-PET</title>
    <base href="/">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="./adopt-a-pet/style/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;700&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>

<body>


    <main>
        <aside>
            <i onclick="deletemyFunction();" class='fas'>&#xf060;</i>
            <div id="login" class="container-fluid">


                <div class="col-xl-6 p-0 col-md-6 col-sm-12">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"
                        autocomplete="off">

                        <?php
          if ( isset($errMSG) ) {
            echo  $errMSG; ?>
                        <?php
              }
            ?>

                        <h1>LOGIN</h1>
                        <label>
                            <p>USER E-MAIL:</p>
                            <input type="email" name="email" placeholder="Your Email" value="<?php echo $email; ?>"
                                maxlength="40" />
                            <span class="text-danger"><?php  echo $emailError; ?></span>
                        </label>
                        <label>
                            <p>PASSWORD:</p>
                            <input type="password" name="pass" placeholder="Your Password" maxlength="15" />
                            <span class="text-danger"><?php  echo $passError; ?></span>
                        </label>
                        <label>
                            <input type="submit" class="btn" name="btn-login" value="LOGIN">
                            <a href="./adopt-a-pet/login/register.php">
                                <p>Sign Up Here...</p>
                            </a>
                        </label>

                    </form>

                </div>
            </div>

        </aside>
        <section>

            <div id="movediv" class="content">
                <video id="videoBG" autoplay muted loop>
                    <source src="./adopt-a-pet/assets/dog_bg.mp4" type="video/mp4">
                </video>
                <div class="heading">
                    <h1>ADOPT<br><span>AN ANIMAL</span></h1>
                </div>

                <div class="container">
                    <h1>WE ARE SEARCHING NEW HOMES FOR ...</h1>
                </div>

                <div class="container">

                    <div>
                        <h1>DOGS</h1>
                        <img
                            src="https://images.pexels.com/photos/1851164/pexels-photo-1851164.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500">
                    </div>

                    <div>
                        <h1>CATS</h1>
                        <img
                            src="https://images.pexels.com/photos/1741205/pexels-photo-1741205.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500">
                    </div>

                    <div>
                        <h1>FISHES</h1>
                        <img
                            src="https://images.pexels.com/photos/45910/goldfish-carassius-fish-golden-45910.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260">
                    </div>

                    <div>
                        <h1>BIRDS</h1>
                        <img
                            src="https://images.pexels.com/photos/56733/pexels-photo-56733.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500">
                    </div>

                    <div>
                        <h1>RABBITS</h1>
                        <img
                            src="https://images.pexels.com/photos/3820509/pexels-photo-3820509.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260">
                    </div>

                </div>

                <div class="row banner">
                    <h2>BECOME A <strong>MEMBER</strong>,<strong> HERO</strong> & <strong>
                            <nobr>PET-OWNER</nobr>
                        </strong></h2>
                    <button onclick="myFunction();">BECOME A MEMBER</button>
                    <script>
                    function myFunction() {
                        var element = document.getElementById("movediv");
                        element.classList.remove("moveitback");
                        element.classList.add("moveit");
                    }

                    function deletemyFunction() {
                        var element = document.getElementById("movediv");
                        element.classList.remove("moveit");
                        element.classList.add("moveitback");

                    }
                    </script>
                </div>


            </div>

        </section>
    </main>




</body>

</html>
<?php ob_end_flush(); ?>