<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <title>Detailed poll</title>
    <meta name="description" content="Detailed poll">
    <meta name="keywords" content="HTML,POLL">
    <meta name="author" content="D">

    <style>
      .error {color: #FF0000;}
    </style>

  </head>
  <body>

    <nav>
      <a href="index.php">Back to the main page</a>
    </nav>
    <hr><br>

    <section>

      <h2>User poll about website</h2><br>

      <?php
        define("NUM", 99);
        $nameErr = $ageErr = $genderErr = $result = "";
        $count = $key= 0;
        $current = $next = $reset = "";
        $name = $age = $gender = $message = "";
        $mood= isset($_POST[ "select" ]) ? $_POST[ "select" ] : "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          if (empty($_POST["name"]) || $_POST["name"] == 'Marcin') {
            $nameErr = "Name is required";
          } else {
            $name = test_input($_POST["name"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
              $nameErr = "Only letters and white space allowed";
            }
          }

          if (empty($_POST["age"])) {
            $ageErr = "Age is required";
          } else {
            if((int)$_POST["age"] == NUM){
              $message = "<p>Podales wiek 99 lat.</p>";
            }
            $age = test_input($_POST["age"]);
            if (!preg_match("/^[0-9]*$/",$age)) {
              $ageErr = "Only numbers!";
            }
          }

          if (empty($_POST["gender"])) {
            $genderErr = "Gender is required";
            } else {
            $gender = test_input($_POST["gender"]);
            }

          if(!empty($_POST["music"])){
            $genre = $_POST['music'];
            $count = count($genre);
            $current = current($genre);
            $next = next($genre);
            $key = key($genre);
            $reset = reset($genre);
            foreach ($_POST['music'] as $g){
                $result .= $g.", ";
            }
          }
          }


        function test_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
        }
      ?>

<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Age: <input type="text" name="age" value="<?php echo $age;?>">
  <span class="error">* <?php echo $ageErr.$message;?></span>

  <br><br>
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>

  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other
  <span class="error">* <?php echo $genderErr;?></span>

  <br><br>
  Music genres you like:<br>
  <input type="checkbox" name="music[]" value="Ambient"> Ambient<br>
  <input type="checkbox" name="music[]" value="Drone"> Drone<br>
  <input type="checkbox" name="music[]" value="folk"> Folk<br>
  <input type="checkbox" name="music[]" value="Atmospheric Black Metal"> Atmospheric Black Metal<br>
  <input type="checkbox" name="music[]" value="Progressive Rock/Metal"> Progressive Rock/Metal<br><br>

  How do you feel today:<br>
  <p>
    <select name="select">
      <option selected> </option>
      <option>Good</option>
      <option>Bad</option>
    </select>
  </p>
  <br><br>

  <input type="submit" value="Submit">
  <input type="reset" value="Reset"><br><br><br>

</form>

<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<h2>Your Input:</h2>";
    echo "<b>Wiek:</b> ".$age."<br>";
    echo "<b>Imie:</b> ".preg_replace('/admin/', 'fake',$name)."<br>";
    echo "<b>Plec:</b> ".$gender."<br>";
    echo "<b>Your mood is:</b> ".$mood."<br>";
    echo "<b>Current:</b> ".$current."  <b>Next: </b>".$next."  <b>Key from current postion:</b> ".$key." <b>Reset:</b> ".$reset."<br>";
    echo "<b>Ilość zaznaczonych: </b>".$count."  <b>Music genres you like:</b> ".$result;
  }
?>


    </section>

  </body>
</html>
