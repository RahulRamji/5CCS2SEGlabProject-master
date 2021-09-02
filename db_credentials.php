<?php

/* define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "chess_society"); */

$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "chess_society";

// $servername = "localhost";
// $dBUsername = "id11943878_valencia";
// $dBPassword = "!28uaBJ3&Z";
// $dBName = "id11943878_chess_society";

$conn = mysqli_connect($servername, $dBUsername,$dBPassword,$dBName);

if(!$conn){
    die("Connection naenae ".mysqli_connect_error());
}

?>
