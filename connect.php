<?php

// $dbhost="localhost:8889";

// $dbuser = "root";
// $dbpass="root";
// $dbname="flowers";

$dbhost="137.184.82.24";

$dbuser = "myadmin";
$dbpass="MySQL@admin!12345";
$dbname="flowers";

// $(variable) vs define(constant)
// you can't change the name of variable for constant 

// constant variable 
// define("DBHOST","localhost:8889");
// define("DBUSER","root");
// define("DBPASS","root");
// define("DBNAME","flowers");



if(!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)){
    // functions take arguments //
    die(" failed to connect to database" .mysqli_connect_error());
  
}

?>