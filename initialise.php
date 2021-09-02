<?php

require_once("database.php");
require_once("functions.php");
require_once("query_functions.php");

$db = db_connect();

delete_Member("added member");
$set = get_Members();
while ($member = mysqli_fetch_assoc($set))
{
    echo $member["name"];
    echo $member["email"];
    echo $member["password"];
    echo $member["elo_rating"];
    echo $member["officer"] . " /n ";
}

?>