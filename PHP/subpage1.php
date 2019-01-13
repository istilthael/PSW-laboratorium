<?php

if (isset($_POST['radio']) && $_POST['radio'] == "default") {
        setcookie('radio1', "true", time() + 3600, '/');
        setcookie('radio2', "false", time() + 3600, '/');
        setcookie('radio3', "false", time() + 3600, '/');
        echo '<meta http-equiv="refresh" content="0">';
    } else if(isset($_POST['radio']) && $_POST['radio'] == "fancy") {
        setcookie('radio1', "false", time() + 3600, '/');
        setcookie('radio2', "true", time() + 3600, '/');
        setcookie('radio3', "false", time() + 3600, '/');
        echo '<meta http-equiv="refresh" content="0">';
    } else if(isset($_POST['radio']) && $_POST['radio'] == "bright"){
      setcookie('radio1', "false", time() + 3600, '/');
      setcookie('radio2', "false", time() + 3600, '/');
      setcookie('radio3', "true", time() + 3600, '/');
      echo '<meta http-equiv="refresh" content="0">';
    }


?>
<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <title>Basic user data</title>
    <meta name="description" content="Form 1">
    <meta name="keywords" content="HTML,POLL">
    <meta name="author" content="D">
    <script src="poll.js">

    </script>

  </head>
  <body>
    <?php

?>

    <nav>
      <a href="index.php">Back to the main page</a>
    </nav>
    <hr><br>
    <section>

        <form style="width:300px" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" onclick="changeStyle()" >
          <fieldset>
              <legend>Select a page style</legend>

              <div>
                  <input type="radio" id="default" name="radio" value="default" <?php if(isset($_COOKIE['radio1']) && $_COOKIE['radio1']=='true') {echo ' checked';}?> />
                  <label for="default">Default</label>
              </div>

              <div>
                  <input type="radio" id="fancy" name="radio" value="fancy" <?php if(isset($_COOKIE['radio2']) && $_COOKIE['radio2']=='true') {echo ' checked';}?> />
                  <label for="fancy">Fancy</label>
              </div>

              <div>
                  <input type="radio" id="bright" name="radio" value="bright" <?php if(isset($_COOKIE['radio3']) && $_COOKIE['radio3']=='true') {echo ' checked';}?> />
                  <label for="bright">Bright</label>
              </div>

              <input type="submit" value="Submit">

          </fieldset>
      </form>



      <h2>Basic user form</h2><br>
      <form autocomplete="on" method="get" onsubmit="return confirm_submit();">

        First name:<br>

        <input type="text" name="firstname" autofocus onkeypress="uniCharCode(event)">
        Format: [A-Za-z]<br><span id="text1"></span><br><br>


        Last name:<br>
        <input type="text" onfocus="myFocus()" onblur="myBlur()" name="lastname" required>
        Allowed characters: [A-Za-z]<br><br>

        Month of birth:<br>
        <input list="months" name="birthmonth"> Choose a month from the list <br><br>

        Email address:<br>
        <input type="email" name="address" required> Format: x@y.z<br><br>

        Phone number:<br>
        <input type="tel" name="number" pattern="[0-9]{9}"> Enter 9 digits<br><br>

        <input type="submit" value="Submit">
        <input type="reset" value="RESET" onclick="return confirm_reset();">

        <datalist id="months">
          <option value="January">
          <option value="February">
          <option value="March">
          <option value="April">
          <option value="May">
          <option value="June">
          <option value="July">
          <option value="August">
          <option value="September">
          <option value="October">
          <option value="November">
          <option value="December">
        </datalist>

      </form>
    </section>
  </body>
</html>
