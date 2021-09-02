<?php 


require_once("db_credentials.php");

function db_connect() //custom function to connect to the db
{
    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    //var_dump($connection); //debug
    return $connection;
    
}

function db_disconnect($connection) //custom function to disconnect to the db
{
    if (isset($connection))
    {
        mysqli_close($connection);
    }  
}

?>

