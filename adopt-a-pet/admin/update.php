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

      <div class="col-xl-6 p-0 col-md-6 col-sm-12">
      <form action="insert.php">
          <h1>ADD ANIMAL!</h1>
          <label>
            NAME:<br>
            <input type="text" name="name">
          </label>
          
          <label>
            LOCATION:<br>
            <input type="text" name="location">
          </label>
          <label>
            IMAGE:<br>
            <input type="text" name="img">
          </label>
          <br>
          
          <br>
          <label>
            AGE IN YEARS:<br>
            <input type="number" name="age">
          </label>
          <br>

          <label>
            DESCRIPTION: <br>
            <input type="text" name="description">
          </label>
          <br>

          <label>
            HOBBIES:<br>
            <input type="text" name="hobbies">
          </label>
          <br>


          <input type="submit" class="btn" value="ADD">
  
        </form>
      </div>
    </div>
  </div>

</body>
</html>