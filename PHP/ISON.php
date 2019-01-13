<?php
    session_start();


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

      if($row[0] == 'dagon' && $row[1] == $_SESSION['pass']){
        echo "Witaj uzytkowniku ". $_COOKIE['login'];
      }else{
        header("Location: index.php");
      }

      mysqli_close($database);




?>
<!doctype html>

<html lang="en">
  <head>

    <meta charset="utf-8">
    <title>ISON</title>
    <meta name="description" content="Information about ISON">
    <meta name="keywords" content="HTML,ISON,MUSIC">
    <meta name="author" content="D">
    <link rel="stylesheet" type="text/css" href="ison_style.css">
    <script src="ison.js">

    </script>


  </head>

  <body>


    <nav>
      <a href="https://ison444.bandcamp.com">ISON bandcamp page</a><br>
      <a href="index.php">Back to the main page</a>
    </nav>
    <hr><br>

    <a href="1.png" download>
    <img src="1.png" alt="ISON logo" height="100">
    </a>



    <section>
      <h2 id="is" onclick="MyFunction1()">ISON</h2>
      <button type="button" id="button1" onclick="MyFunction3()">button</button><br><br>
      <button type="button" id="button2" onclick="myFunction2()">button2</button><br><br>
      <button type="button" id="button2" onclick="myFunction()">button3</button><br><br>

      <div id="test"></div><br><br>
      ISON is a drone/ambient music band from Sweden, which was formed in 2015.<br>
      Its members are <b>Daniel Änghede</b> and <b>Heike Langhans</b>.<br>
      The official band's bandcamp site states the following:
      <br><pre>"Inspired by Drone, Black Metal, Goth & Shoegaze, combined with a deep fascination for the astral planes
       and the universe."</pre><br>
      <aside>
        The band's name probably originates from comet ISON (C/2012 S1).<br><br>
      </aside>

    </section>
    <details>
    <summary><b>ISON discography:</b><br><br></summary>

      <ul>
        <li> Cosmic Drone (EP)
          <ol type="1">
          <li>Lost Satellites</li>
          <li>Atlas</li>
          <li>RedShift</li>
          <li>Icosahedron</li>
          <li>Travellers</li>
        </ol></li>

        <li>Andromeda Skyline (EP)
          <ol type="1">
          <li>Into the unknown</li>
          <li>Portals</li>
          <li>Helios</li>
          <li>Nebula</li>
          <li>Andromeda Skyline<br><br></li>
        </ol></li>
      </ul>

    </details>

    <div id="fun"></div>
    <div id="fun1"></div>

  </body>
</html>
