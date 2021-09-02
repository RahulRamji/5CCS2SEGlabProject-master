<?php 
session_start();
?>
<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Bree+Serif|Open+Sans&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="./stylesheets/profile.css">
        
    </head>
    <style>

    .show {
        display:flex;
        justify-content: center;
        align-items:center;
        text-align: center;
    }
    
    .hidden {
        display: none;
    }

        #officer {
        display: flex;
        align-self: center;
        justify-content: center;
        align-items:center;
        text-align: center;
        height: 30px;
        width: 100px;
        font-size: 14px;
        letter-spacing: 2px;
        background: #EF2F2F;
        border-radius: 25px;
        color: white;
        }

    </style>
    <body>
        <?php include_once("../inc/header.php");?>
        <div class="upper">
            <div class="pf">
                <img id="pic" src="http://clipart-library.com/images/ziXqjXkiB.png"/>
                <h1 id="name"><?=$_SESSION['name']?></h1>
                <p id="date">joined in <?=$_SESSION['date']?></p>
                <div id="officer">
                <?echo $_SESSION["officer"] == 1 ? 'OFFICER' : 'MEMBER';?>
                </div>
            </div>
            <div class="elo">
                <h2>ELO rating</h2>
                <h1><?=$_SESSION['elo']?></h1>
            </div>
        </div>
        <hr/>
        <div class="lower">
            <a id="edit" href="./editProfile.php">Edit</a>
            <h3>EMAIL<h3>
            <h2><?=$_SESSION['email']?></h2>
            <h3>PHONE<h3>
            <h2><?=$_SESSION['phone']?></h2>
            <h3>ADDRESS<h3>
            <h2><?=$_SESSION['maddress']?></h2>
            <h3>DOB<h3>
            <h2><?=$_SESSION['dob']?></h2>
        </div>
    </body>
    
</html>

