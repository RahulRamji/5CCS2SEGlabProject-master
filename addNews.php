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
<h2>News</h2>

<div style="margin-top:30px; border-radius: 30px;" class="lower">
            <form action="" method="post">
                <label style="margin-top:10px"for="name">Title</label>
                <input type="text" id="title" name="title" placeholder="Article title..">
                <label for="address">Article</label>
                <textarea style="height: 200px; width: 90%;" type="text" id="body" name="body" placeholder="Write the body of your article here..">
                </textarea>
                <label for="expiry">Deletion Date</label>
                <input style="margin-bottom:30px"  type="date" min="<?php echo date("Y-m-d") ?>" id="dateEx" name="dateEx" placeholder="DD/MM/YYYY">
                <input style="font-size:18px" type="submit" name="addN" value="Add"/>
            </form>
</div>
</div>
</body>
</html>
<?php
if(isset($_POST["addN"])){
    require '../resources/db_credentials.php';
    $title = $_POST["title"];
    $content = $_POST["body"];
    $date_expire = $_POST["dateEx"];
    $posted =  date("Y-m-d");

    $sql = "INSERT INTO Article (title, content, date_posted, expiry) VALUES (?,?,?,?)";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo '<meta http-equiv="refresh" content="0; URL=./news.php?error=sqlerror1">';
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "ssss", $title, $content, $posted, $date_expire);
        mysqli_stmt_execute($stmt);
        echo '<meta http-equiv="refresh" content="0; URL=./news.php">';
        exit();
    }
    
}
?>