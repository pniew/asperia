<?php
// define('DB_SERVER', '37.59.55.185');
// define('DB_USERNAME', 'x2qWHOulje');
// define('DB_PASSWORD', 'jn81H8K0eD');
// define('DB_NAME', 'x2qWHOulje');

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'aaaaa');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>