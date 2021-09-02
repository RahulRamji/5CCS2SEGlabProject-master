<!DOCTYPE html>
<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Bree+Serif|Open+Sans&display=swap" rel="stylesheet">
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
    margin-top: 30px;
    display: flex;
    flex-direction: column;
    height: 100%;
    align-items: center;
    justify-content: center;
}

h3 {
    font-family: 'Bree Serif', sans-serif;
}

</style>
</head>

<body>
<header><?php include_once("../inc/header.php");?></header>
<div class="block">
<h2><?=$_GET['name']?></h2>

<div style="margin-top:30px; border-radius: 30px;" class="lower">
            <h3>Location<h3>
            <h2><?=$_GET['loc']?></h2>
            <h3>Date<h3>
            <h2><?=$_GET['date']?></h2>
        </div>
</div>
</body>
</html>