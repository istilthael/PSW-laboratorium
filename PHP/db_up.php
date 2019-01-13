<?php


$query = "CREATE OR REPLACE DATABASE nowa";
if ( !( $database = mysqli_connect( "localhost","root","qwer")))
  die("Couldnt connect.");

if ( !( $result = mysqli_query($database, $query ) ) ){
  print( "<p>Could not execute query!</p>" );
  die( mysqli_error() );
}

if ( !mysqli_select_db($database,"nowa"))
  die("Couldnt connect.");
$query = "CREATE TABLE `test` ( `test1` VARCHAR(10) NOT NULL , `test2` INT(5) NOT NULL PRIMARY KEY)";
if ( !( $result = mysqli_query($database, $query ) ) ){
  print( "<p>Could not execute query!</p>" );
  die( mysqli_error() );
}

$query = "INSERT INTO test VALUES ('tekst',2)";
if ( !( $result = mysqli_query($database, $query ) ) ){
  print( "<p>Could not execute query!</p>" );
  die( mysqli_error() );
}
echo "Dodanie pomyslne.";

mysqli_close($database);

?>
