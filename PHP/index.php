>8 znkaow, 1 cyfra, 1 znak specjalny, konczy sie litera, 1 wielka litera

<?php
    session_start();
    $iserror = true;

    if (isset($_POST["login"]) && isset($_POST["pass"])){
      setcookie("login", $_POST["login"], time() + 3600, '/');
      setcookie("pass", $_POST["pass"], time() + 3600, '/');
      setcookie("session", session_id(), time() + 3600, '/');
      if (isset($_COOKIE["login"])){$_SESSION["login"] = $_COOKIE["login"];}
      if (isset($_COOKIE["pass"])){$_SESSION["pass"] = $_COOKIE["pass"];}
      $iserror = false;
      $_SESSION["logged"] = "true";
    }

    if (isset($_COOKIE['login']) && $_COOKIE['login'] == 'dog' && isset($_COOKIE['pass']) && $_COOKIE['pass'] == 'cat') {
        print_r($_SESSION);
    } else {
      print_r($_SESSION);
    }


?>
<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <title>Atmospheric music</title>
    <meta name="description" content="Start page of music info">
    <meta name="keywords" content="HTML,MUSIC,AMBIENT,ATMOSPHERIC">
    <meta name="author" content="D">
    <?php
    if(isset($_POST['submit']))
      echo "<meta http-equiv=refresh content=\"0; URL=index.php\">";
 ?>

    <link rel="stylesheet" type="text/css" href="index_style.css">

    <style>

    body  {margin-left: 50px;}

    </style>

  </head>
  <body>


    <div class="nav">
      <table>
        <tr>
          <th>Bands' subpages: </th>
          <th>User forms:</th>
        </tr>

        <tr>
          <td>
            <a href="ISON.php">ISON </a><br>
            <a href="db_down.php">SUNN O))) </a>
          </td><td>
            <a href="poll.php">Poll</a><br>
            <a href="subpage1.php">Basic user form</a><br>
            <a href="subpage2.html">Detailed user form</a><br>
            <a href="test.php">Register</a>
          </td>
        </tr>
      </table>
    </div>




    <?php

    if(!$iserror && isset($_COOKIE['login'])){
      $query = "SELECT username,password FROM USER WHERE USERNAME='".$_COOKIE['login']."'";
      if ( !( $database = mysqli_connect( "localhost","root","qwer")))
        die("Couldnt connect.");

      if ( !mysqli_select_db($database,"poll"))
        die("Couldnt connect.");

      if ( !( $result = mysqli_query($database, $query ) ) ){
        print( "<p>Could not execute query!</p>" );
        die( mysqli_error() );
      }

      $row = mysqli_fetch_row($result);

      if($row[0] == $_COOKIE['login'] && $row[1] == $_COOKIE['pass']){
        echo "Witaj uzytkowniku ". $_COOKIE['login'];
        $_SESSION["logged"] = "true";
      }else{
        echo "Zaloguj sie!";
      }

      mysqli_close($database);

    }

    ?>
    <form autocomplete="on" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onSubmit="window.location.reload()">

      Login:<br>
      <input type="text" name="login" required>
      <br>

      Password:<br>
      <input type="password" name="pass" required>
      <br><br>
      <input type="submit"><br><br>
      <a href="logout.php" >Logout</a>

    </form>

    <header>
    <h1 id="top" style="color:blue">ATMOSPHERIC MUSIC</h1>
    </header>

    <article>
      <h2><i>This site is about various bands playing music from genres
        including, but not limited to<br> drone, ambient, atmospheric, alternative,
        progressive.<br><br>
      </i></h2>

      <section id="section1">

        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse egestas felis nec lacus pellentesque,
        sed blandit justo suscipit. <br>Nam turpis turpis, dapibus vitae purus sed, rhoncus viverra turpis. Mauris
        tempor dui ac erat condimentum fermentum. Vivamus eu est lacus. <br>Aliquam erat volutpat. Integer efficitur
        dolor sed urna mollis, nec facilisis lacus porta. Phasellus accumsan laoreet quam a porta. Donec eget pharetra
        dolor. <br>Vivamus orci sapien, porta nec maximus ut, rhoncus id sapien. In dignissim sagittis ornare. Nunc
        ultrices vitae mi at pulvinar.<br><br><br>

      </section>
      <section id="section2">

        <h2>About different kinds of music</h2>

        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse egestas felis nec lacus pellentesque,
        sed blandit justo suscipit. <br>Nam turpis turpis, dapibus vitae purus sed, rhoncus viverra turpis. Mauris
        tempor dui ac erat condimentum fermentum. Vivamus eu est lacus. <br>Aliquam erat volutpat. Integer efficitur
        dolor sed urna mollis, nec facilisis lacus porta. Phasellus accumsan laoreet quam a porta. Donec eget pharetra
        dolor. <br>Vivamus orci sapien, porta nec maximus ut, rhoncus id sapien. In dignissim sagittis ornare. Nunc
        ultrices vitae mi at pulvinar.<br><br><br>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse egestas felis nec lacus pellentesque,
        sed blandit justo suscipit. <br>Nam turpis turpis, dapibus vitae purus sed, rhoncus viverra turpis. Mauris
        tempor dui ac erat condimentum fermentum. Vivamus eu est lacus. <br>Aliquam erat volutpat. Integer efficitur
        dolor sed urna mollis, nec facilisis lacus porta. Phasellus accumsan laoreet quam a porta. Donec eget pharetra
        dolor. <br>Vivamus orci sapien, porta nec maximus ut, rhoncus id sapien. In dignissim sagittis ornare. Nunc
        ultrices vitae mi at pulvinar.<br><br><br>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse egestas felis nec lacus pellentesque,
        sed blandit justo suscipit. <br>Nam turpis turpis, dapibus vitae purus sed, rhoncus viverra turpis. Mauris
        tempor dui ac erat condimentum fermentum. Vivamus eu est lacus. <br>Aliquam erat volutpat. Integer efficitur
        dolor sed urna mollis, nec facilisis lacus porta. Phasellus accumsan laoreet quam a porta. Donec eget pharetra
        dolor. <br>Vivamus orci sapien, porta nec maximus ut, rhoncus id sapien. In dignissim sagittis ornare. Nunc
        ultrices vitae mi at pulvinar.<br><br><br>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse egestas felis nec lacus pellentesque,
        sed blandit justo suscipit. <br>Nam turpis turpis, dapibus vitae purus sed, rhoncus viverra turpis. Mauris
        tempor dui ac erat condimentum fermentum. Vivamus eu est lacus. <br>Aliquam erat volutpat. Integer efficitur
        dolor sed urna mollis, nec facilisis lacus porta. Phasellus accumsan laoreet quam a porta. Donec eget pharetra
        dolor. <br>Vivamus orci sapien, porta nec maximus ut, rhoncus id sapien. In dignissim sagittis ornare. Nunc
        ultrices vitae mi at pulvinar.<br><br><br>

        <section id="section3">

          <h3 class="new">On a side note: about Drone Metal</h3>

          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse egestas felis nec lacus pellentesque,
          sed blandit justo suscipit. <br>Nam turpis turpis, dapibus vitae purus sed, rhoncus viverra turpis. Mauris
          tempor dui ac erat condimentum fermentum. Vivamus eu est lacus. <br>Aliquam erat volutpat. Integer efficitur
          dolor sed urna mollis, nec facilisis lacus porta. Phasellus accumsan laoreet quam a porta. Donec eget pharetra
          dolor. <br>Vivamus orci sapien, porta nec maximus ut, rhoncus id sapien. In dignissim sagittis ornare. Nunc
          ultrices vitae mi at pulvinar.<br><br><br>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse egestas felis nec lacus pellentesque,
          sed blandit justo suscipit. <br>Nam turpis turpis, dapibus vitae purus sed, rhoncus viverra turpis. Mauris
          tempor dui ac erat condimentum fermentum. Vivamus eu est lacus. <br>Aliquam erat volutpat. Integer efficitur
          dolor sed urna mollis, nec facilisis lacus porta. Phasellus accumsan laoreet quam a porta. Donec eget pharetra
          dolor. <br>Vivamus orci sapien, porta nec maximus ut, rhoncus id sapien. In dignissim sagittis ornare. Nunc
          ultrices vitae mi at pulvinar.<br><br><br>

      </section><br><br>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse egestas felis nec lacus pellentesque,
        sed blandit justo suscipit. <br>Nam turpis turpis, dapibus vitae purus sed, rhoncus viverra turpis. Mauris
        tempor dui ac erat condimentum fermentum. Vivamus eu est lacus. <br>Aliquam erat volutpat. Integer efficitur
        dolor sed urna mollis, nec facilisis lacus porta. Phasellus accumsan laoreet quam a porta. Donec eget pharetra
        dolor. <br>Vivamus orci sapien, porta nec maximus ut, rhoncus id sapien. In dignissim sagittis ornare. Nunc
        ultrices vitae mi at pulvinar.<br><br><br>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse egestas felis nec lacus pellentesque,
        sed blandit justo suscipit. <br>Nam turpis turpis, dapibus vitae purus sed, rhoncus viverra turpis. Mauris
        tempor dui ac erat condimentum fermentum. Vivamus eu est lacus. <br>Aliquam erat volutpat. Integer efficitur
        dolor sed urna mollis, nec facilisis lacus porta. Phasellus accumsan laoreet quam a porta. Donec eget pharetra
        dolor. <br>Vivamus orci sapien, porta nec maximus ut, rhoncus id sapien. In dignissim sagittis ornare. Nunc
        ultrices vitae mi at pulvinar.<br><br><br>
      </section>




      <section id="section4">

        <h2 class="new">Further discussion</h2>

        <br><br><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse egestas felis nec lacus pellentesque,
        sed blandit justo suscipit. <br>Nam turpis turpis, dapibus vitae purus sed, rhoncus viverra turpis. Mauris
        tempor dui ac erat condimentum fermentum. Vivamus eu est lacus. <br>Aliquam erat volutpat. Integer efficitur
        dolor sed urna mollis, nec facilisis lacus porta. Phasellus accumsan laoreet quam a porta. Donec eget pharetra
        dolor. <br>Vivamus orci sapien, porta nec maximus ut, rhoncus id sapien. In dignissim sagittis ornare. Nunc
        ultrices vitae mi at pulvinar.<br><br><br>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse egestas felis nec lacus pellentesque,
        sed blandit justo suscipit. <br>Nam turpis turpis, dapibus vitae purus sed, rhoncus viverra turpis. Mauris
        tempor dui ac erat condimentum fermentum. Vivamus eu est lacus. <br>Aliquam erat volutpat. Integer efficitur
        dolor sed urna mollis, nec facilisis lacus porta. Phasellus accumsan laoreet quam a porta. Donec eget pharetra
        dolor. <br>Vivamus orci sapien, porta nec maximus ut, rhoncus id sapien. In dignissim sagittis ornare. Nunc
        ultrices vitae mi at pulvinar.<br><br><br>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse egestas felis nec lacus pellentesque,
        sed blandit justo suscipit. <br>Nam turpis turpis, dapibus vitae purus sed, rhoncus viverra turpis. Mauris
        tempor dui ac erat condimentum fermentum. Vivamus eu est lacus. <br>Aliquam erat volutpat. Integer efficitur
        dolor sed urna mollis, nec facilisis lacus porta. Phasellus accumsan laoreet quam a porta. Donec eget pharetra
        dolor. <br>Vivamus orci sapien, porta nec maximus ut, rhoncus id sapien. In dignissim sagittis ornare. Nunc
        ultrices vitae mi at pulvinar.<br><br><br>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse egestas felis nec lacus pellentesque,
        sed blandit justo suscipit. <br>Nam turpis turpis, dapibus vitae purus sed, rhoncus viverra turpis. Mauris
        tempor dui ac erat condimentum fermentum. Vivamus eu est lacus. <br>Aliquam erat volutpat. Integer efficitur
        dolor sed urna mollis, nec facilisis lacus porta. Phasellus accumsan laoreet quam a porta. Donec eget pharetra
        dolor. <br>Vivamus orci sapien, porta nec maximus ut, rhoncus id sapien. In dignissim sagittis ornare. Nunc u
        ltrices vitae mi at pulvinar.<br><br><br>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse egestas felis nec lacus pellentesque,
        sed blandit justo suscipit. <br>Nam turpis turpis, dapibus vitae purus sed, rhoncus viverra turpis. Mauris
        tempor dui ac erat condimentum fermentum. Vivamus eu est lacus. <br>Aliquam erat volutpat. Integer efficitur
        dolor sed urna mollis, nec facilisis lacus porta. Phasellus accumsan laoreet quam a porta. Donec eget pharetra
        dolor. <br>Vivamus orci sapien, porta nec maximus ut, rhoncus id sapien. In dignissim sagittis ornare. Nunc
        ultrices vitae mi at pulvinar.<br><br><br>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse egestas felis nec lacus pellentesque,
        sed blandit justo suscipit. <br>Nam turpis turpis, dapibus vitae purus sed, rhoncus viverra turpis. Mauris
        tempor dui ac erat condimentum fermentum. Vivamus eu est lacus. <br>Aliquam erat volutpat. Integer efficitur
        dolor sed urna mollis, nec facilisis lacus porta. Phasellus accumsan laoreet quam a porta. Donec eget pharetra
        dolor. <br>Vivamus orci sapien, porta nec maximus ut, rhoncus id sapien. In dignissim sagittis ornare. Nunc
        ultrices vitae mi at pulvinar.<br><br><br>

    </section>

    </article><footer id="bottom">

        <a href="#">Go to the top</a>

    </footer>
  </body>
</html>
