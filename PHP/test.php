<?php     session_start();
 ?>
<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <title>Basic user data</title>
    <meta name="description" content="Form 1">
    <meta name="keywords" content="HTML,POLL">
    <meta name="author" content="D">

    <style>
      .error {color: #FF0000;}
    </style>

  </head>
  <body>
    <a href="index.php">Back to the main page</a>


    <?php
      $nameErr = $emailErr = $usernameErr = $passwordErr = "";
      $name = $email = $username = $password = "";
      $iserror = false;
      $message = "";

      if(isset($_SESSION["logged"]) && $_SESSION["logged"] == "true"){
        $query = "SELECT * FROM USER WHERE USERNAME = '{$_SESSION["login"]}'";
        if ( !( $database = mysqli_connect( "localhost","root","qwer")))
          die("Couldnt connect.");

        if ( !mysqli_select_db($database,"poll"))
          die("Couldnt connect.");

        if ( !( $result = mysqli_query($database, $query ) ) ){
          print( "<p>Could not execute query!</p>" );
          die( mysqli_error($database) );
        }

        $row = mysqli_fetch_row($result);
        $name = $row[0];
        $email = $row[1];
        $username = $row[2];
        $password = $row[3];

        mysqli_close($database);



      }

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
          $nameErr = "Name is required";
          $iserror = true;
        } else {
          $name = test_input($_POST["name"]);
          // check if name only contains letters and whitespace
          if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
            $nameErr = "Only letters and white space allowed";
            $iserror = true;
          }
        }

        if (empty($_POST["email"])) {
          $emailErr = "Email is required";
          $iserror = true;
        } else {
          $email = test_input($_POST["email"]);
          // check if e-mail address is well-formed
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $iserror = true;
          }
        }

        if (empty($_POST["username"])) {
          $usernameErr = "Username is required";
          $iserror = true;
        } else {
          $username = test_input($_POST["username"]);
          // check if name only contains letters and whitespace
          if (!preg_match("/^[a-zA-Z ]*$/",$username)) {
            $usernameErr = "Only letters and white space allowed";
            $iserror = true;
          }
        }

        if (empty($_POST["password"])) {
          $passwordErr = "Password is required";
          $iserror = true;
        } else {
          $password = test_input($_POST["password"]);
          // check if name only contains letters and whitespace
          if (!preg_match("^(?=\S{8,})(?=\S*[a-z])(?=\S*[\W])(?=\S*[A-Z])(?=\S*[\d])\S*$^",$password) && !preg_match('@[a-z]@',substr($password, -1))) {
            $passwordErr = "Only letters and white space allowed";
            $iserror = true;
          }
        }

        if(!$iserror && !isset($_SESSION["logged"])){
          $query = "INSERT INTO user VALUES('$name','$email','$username','$password')";
          if ( !( $database = mysqli_connect( "localhost","root","qwer")))
            die("Couldnt connect.");

          if ( !mysqli_select_db($database,"poll"))
            die("Couldnt connect.");

          if ( !( $result = mysqli_query($database, $query ) ) ){
            print( "<p>Could not execute query!</p>" );
            die( mysqli_error() );
          }
          $message = "<p>Pomyslnie wpisano dane do bazy danych</p>";
          $name = $email = $username = $password = "";
	mysqli_close($database);



        } else if(isset($_SESSION["logged"]) && $_SESSION["logged"] == "true"){
            $query = "UPDATE user SET NAME = '$name', USERNAME = '$username', PASSWORD = '$password' WHERE EMAIL='$email'";
            if ( !( $database = mysqli_connect( "localhost","root","qwer")))
              die("Couldnt connect.");

            if ( !mysqli_select_db($database,"poll"))
              die("Couldnt connect.");

            if ( !( $result = mysqli_query($database, $query ) ) ){
              print( "<p>Could not execute query!</p>" );
              die( mysqli_error() );
            }
            $message = "<p>Pomyslnie zmieniono dane</p>";
		mysqli_close($database);


        }
       

      }

      function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
      if(isset($_SESSION["logged"]) && $_SESSION["logged"]=="true"){
        echo "<br><br>Witaj user ".$_SESSION["login"]."!";
      }



?>

    <form id='register' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method='post'
        accept-charset='UTF-8'>
    <legend><<?php if(isset($_SESSION["logged"]) && $_SESSION["logged"]=="true") {
        echo "Zmien dane";
    }else{
      echo "Zarejestruj sie";
    }
            ?></legend>
    <input type='hidden' name='submitted' id='submitted' value='1'/>
    <br><br><label for='name' >Your Full Name: <span class="error">* <?php echo $nameErr;?></span></label><br>
    <input type='text' name='name' id='name' maxlength="50" value="<?php echo $name;?>"/><br><br>
    <label for='email' >Email Address:<span class="error">* <?php echo $emailErr;?></span></label><br>
    <input type='text' name='email' id='email' maxlength="50" value="<?php echo $email;?>"/><br><br>

    <label for='username' >UserName:<span class="error">* <?php echo $usernameErr;?></span></label><br>
    <input type='text' name='username' id='username' maxlength="50" value="<?php echo $username;?>"/><br><br>

    <label for='password' >Password:<span class="error">* <?php echo $passwordErr;?></span></label><br>
    <input type='password' name='password' id='password' maxlength="50" value="<?php echo $password;?>"/>
    <input type='submit' name='Submit' value='Submit' /><br><br><br>
    <?php echo $message ?>

    </form>
    <a href="diagnose.php">See the contents of the database</a>


  </body>
</html>
