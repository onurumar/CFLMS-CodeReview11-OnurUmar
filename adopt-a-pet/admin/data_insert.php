<?php 
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "cr11_onurumar_petadoption";

            $conn = mysqli_connect($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }

          // Escape user inputs for security
            $name = $_POST['name'];
            $age = $_POST['age'];
            $location = $_POST['location'];
            $img = $_POST['img'];
            $description = $_POST['description'];
            $hobbies = $_POST['hobbies'];
            $id = $_POST['id'];

            // Attempt insert query execution
            $sql = "UPDATE animal SET age = '$age', location = '$location', name = '$name', img = '$img', description = '$description', hobbies = '$hobbies' WHERE id = {$id}";

            if($conn->query($sql) === TRUE) {
                echo "<script type=\"text/javascript\">
                setTimeout(
                    function ()
                {
                  self.close();
                }, 3000 );
                </script><div style=\"display:flex;justify-content:center;align-itmes:center;flex-direction:column;\"><img style=\"object-fit:contain;\" src=\"https://www.healthifyme.com/blog/wp-content/uploads/2019/07/success_400x300.gif\"></div>";
            } else {
                echo "ERROR: Could not able to execute . $conn->error .";
            }
          ?>