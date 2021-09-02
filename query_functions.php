<?php
//TODO functions are still "abstract"
//in the way that they're not 
//yet using final database syntax

function get_Members()
{
    global $db;
    $query = "SELECT * FROM Member;";
    $result_set = mysqli_query($db, $query);

    return $result_set;
}


function get_Officers()
{
    global $db;
    
    $query = "SELECT * FROM Member ";
    $query .= "WHERE IS_OFFICER = '1'"; 
    $result_set = mysqli_query($db, $query);
    
    return $result_set;
    
}

function get_Tournaments()
{
    global $db;
    
    $query = "SELECT * FROM TOURNAMENT;";
    $result_set = mysqli_query($db, $query);
    
    return $result_set;
    
}

function get_Articles()
{
    global $db;
    
    $query = "SELECT * FROM Article ";
    $query .= "ORDER BY POST_TIME ASC;"; //check in the db for exact syntax
    $result_set = mysqli_query($db, $query);
    
    return $result_set;
   
    
}

function get_Events()
{
    global $db;
    
    $query = "SELECT * FROM EVENTS ";
    $query .= "ORDER BY POST_TIME ASC;"; //check in the db for exact syntax
    $result_set = mysqli_query($db, $query);
    
    return $result_set;
    
}

function add_Event($title, $location, $date, $time)
{
    global $db;
    //TODO update in future when I have exact database names
    $query = "INSERT INTO EVENT(title, location, date, time) "; //table not made yet
    $query .= "VALUES ('" . $title . "', '" . $location 
        . "', '" . $date . "', '" . $time . "');";
    mysqli_query($db, $query);
}

function add_Member($name, $email, $password, $elo_rating, $officer)
{
    global $db;
    
    $query = "INSERT INTO Member(name, email, password, elo_rating, officer) ";
    $query .= "VALUES ('" . $name . "', '" . $email . "', '" . $password . "', '";
    $query .= $elo_rating . "', '" . $officer . "');";
    if (mysqli_query($db, $query)) {
       echo "New record created successfully";
    } else {
       echo "Error: " . $query . "" . mysqli_error($db);
    }
}

function add_Article($title, $content, $date_posted, $expiry)
{
    global $db;
    
    $query = "INSERT INTO ARTICLE(title, content, date_posted, expiry) ";
    $query .= "VALUES ('" . $title . "', '" . $content . "', '";
    $query .= $date_posted . "', '" . $expiry . "');";
    mysqli_query($db, $query);
}

function add_Tournament()
{
    $query = "";
    //TODO
}

function delete_Member($name)
{
    global $db; 
    
    $query = "DELETE FROM Member ";
    $query .= "WHERE name = '" . $name . "';";
    mysqli_query($db, $query);
}

function delete_Article($name)
{
    global $db;
    
    $query = "DELETE FROM Article ";
    $query .= "WHERE name = '" . $name . "';";
    mysqli_query($db, $query);
}
?>