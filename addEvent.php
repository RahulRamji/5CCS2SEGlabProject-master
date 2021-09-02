<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="./stylesheets/profile.css">
<style>

header {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-start;
    width: 100%;
}

.block {
    margin: auto;
    margin-top: 30px;
    display: flex;
    flex-direction: column;
    height: 100%;
    align-items: center;
    justify-content: center;
}

</style>
</head>

<body>
<header><?php include_once("../inc/header.php");?></header>
<div class="block">
<h2>Event</h2>

<div style="margin-top:30px; border-radius: 30px;" class="lower">
            <form action="" method="post">
                <label style="margin-top:10px"for="name">Name</label>
                <input type="text" id="nameT" name="nameT" placeholder="Event name..">
                <label for="address">Location</label>
                <input type="text" id="phone" name="locT" placeholder="Event location..">
                
                <label for="dateT">Date</label>

                <input style="margin-bottom:30px"  type="date" id="dateT" name="dateT" placeholder="DD/MM/YYYY">
                <input style="font-size:18px" type="submit" name="addT" value="Add"/>
            </form>
</div>
</div>
</body>
</html>
<?php
if(isset($_POST["addT"])){
    require '../resources/db_credentials.php';
    $name = $_POST["nameT"];
    $location = $_POST["locT"];
    $date = $_POST["dateT"];

    $sql = "INSERT INTO Events (title, location, expiry) VALUES (?,?,?)";
    $stmt= $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $location, $date);
    $stmt->execute();
    echo '<meta http-equiv="refresh" content="0; URL=./eventsPage.php">';
    exit();
}
?>