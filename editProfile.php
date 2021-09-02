<?php 
session_start();
?>
<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Bree+Serif|Open+Sans&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="./stylesheets/profile.css">
    </head>
    
    <body>
        <?php include_once("../inc/header.php");?>
        <div class="upper">
            <div class="pf">
                <img id="pic" src="https://i0.wp.com/flukebeauty.com/wp-content/uploads/2017/05/round-profile-pic.png?ssl=1"/>
                <h1 id="name"><?=$_SESSION['name']?></h1>
                <p id="date">joined in <?=$_SESSION['date']?></p>
            </div>
            <div class="elo">
                <h2>ELO rating</h2>
                <h1><?=$_SESSION['elo']?></h1>
            </div>
        </div>
        <hr/>
        <div class="lower">
            <form action="" method="POST">
                <label for="email" name="email">Email</label>
                <h2><?=$_SESSION['email']?></h2>

                <label for="phone">Phone</label>
                <input type="tel" id="phone" name="phone" placeholder="Your phone number..">
                <label for="address">Address</label>
                <input type="text" id="address" name="address" placeholder="Your address..">
                <label for="dob">DOB</label>
                <input type="date" id="dob" max="<?php date(Y-m-d)?>" name="dob" placeholder="DD/MM/YYYY">
                <button type="submit" name="updateP" >Submit</button>
            </form>
        </div>
    </body>
    
</html>
<?php
require '../resources/db_credentials.php';
if( isset($_POST['updateP']) )
{
    $phone= $_POST['phone'];
    $address= $_POST['address'];
    $id  = $_SESSION['email'];
    $sql = "UPDATE Member SET phone='$phone', maddress='$address' WHERE email='$id'";

if ($conn->query($sql) === TRUE) {
    echo '<meta http-equiv="refresh" content="0; URL=./profile.php">';
}

$conn->close();
}
?>

