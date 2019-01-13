<?php

$query = "DROP DATABASE IF EXISTS nowa";
if ( !( $database = mysqli_connect( "localhost","root","qwer")))
  die("Couldnt connect.");

if ( !( $result = mysqli_query($database, $query ) ) ){
  print( "<p>Could not execute query!</p>" );
  die( mysqli_error() );
}

echo "Usuwanie pomyslne.";

mysqli_close($database);

?>
