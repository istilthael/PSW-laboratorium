<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <title>Basic user data</title>
    <meta name="description" content="Form 1">
    <meta name="keywords" content="HTML,POLL">
    <meta name="author" content="D">

  </head>
  <body>
    <a href="test.php">Back to the form</a>

    <h1>WRITE VALUES TO FILTER DATABASE</h1>
    <form id='register' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method='post'
        accept-charset='UTF-8'>
    <input type='hidden' name='submitted' id='submitted' value='1'/>
    Imie:<br><input type='text' name='name' id='name' maxlength="50"><br><br>
    Email:<br><input type='text' name='email' id='email' maxlength="50"><br><br>
    Username:<br><input type='text' name='username' id='username' maxlength="50"><br><br>
    <input type='submit' name='Submit' value='Submit' />
    </form>
    <h1>OUTPUT</h1>

    <?php

        $name = $username = $email = "";

        if(empty($_POST["name"])){
          $name = "%";
        }else {
		
			
          $name = $_POST["name"];
$name = str_replace("*","%",$name);
        }

        if(empty($_POST["email"])){
          $email = "%";
        }else {
          $email = $_POST["email"];
        }

        if(empty($_POST["username"])){
          $username = "%";
        }else {
          $username = $_POST["username"];
        }


        $query = "SELECT * FROM USER WHERE NAME LIKE '$name' AND EMAIL LIKE '$email' AND USERNAME LIKE '$username'";
        if ( !( $database = mysqli_connect( "localhost","root","qwer")))
          die("Couldnt connect.");

        if ( !mysqli_select_db($database,"poll"))
          die("Couldnt connect.");

        if ( !( $result = mysqli_query($database, $query ) ) ){
          print( "<p>Could not execute query!</p>" );
          die( mysqli_error($database) );
        }

        echo "<table border='1'><tr><th>Name</th><th>Email</th><th>Username</th></tr>";

        while($row = mysqli_fetch_array($result))
        {
        echo "<tr>";
        echo "<td>" . $row[0] . "</td>";
        echo "<td>" . $row[1] . "</td>";
        echo "<td>" . $row[2] . "</td>";
        echo "<td>" . $row[3] . "</td>";
        echo "</tr>";
        }
        echo "</table>";

        mysqli_close($database);

    ?>


  </body>
</html>
