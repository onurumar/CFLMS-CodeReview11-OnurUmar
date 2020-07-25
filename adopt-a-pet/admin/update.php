<!DOCTYPE html>
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
<div id="contact" class="container-fluid">
    <div class="row">

      <div class="col-xl-6 p-0 col-md-6 col-sm-12">
      <form action="adopt-a-pet/admin/insert.php">
          <h1>ADD ANIMAL!</h1>
          <label>
            NAME:<br>
            <input type="text" name="name">
          </label>
          <label>
            BREED:<br>
            <input type="text" name="breed">
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
          <label>
            TYPE:<br>
            <select name="type" id="available">
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
            <input type="number" name="age">
          </label>
          <br>
          <input type="submit" class="btn" value="ADD">
  
        </form>
      </div>
    </div>
  </div>

</body>
</html>