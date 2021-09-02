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
<h2>Tournament</h2>

<div style="margin-top:30px; border-radius: 30px;" class="lower">
            <form action="" method="post">
                <label style="margin-top:10px"for="name">Name</label>
                <input type="text" id="nameT" name="nameT" placeholder="Tournament name..">
                <label for="address">Location</label>
                <input type="text" id="phone" name="locT" placeholder="Tournament location..">
                
                <label for="organisers">Organisers</label>
                

                    <select id="organisers" name="organisers[]" multiple>
                        <?php 
                            require '../resources/db_credentials.php';
                            $query = "SELECT name, officer FROM `member`";
                            $set = mysqli_query($conn, $query);
                            if(!$set) {
                                echo "no data";
                            } else {
                                while ($tour = mysqli_fetch_assoc($set))
                                { 
                                    if( $tour['officer'] == '1') {
                                        echo '<option value='. $tour['name'].'>'. $tour['name'].'</option>';
                                    }
                                }
                            }
                        ?>
                    </select>
                
                <label for="dateT">Date</label>

                <input style="margin-bottom:30px"  type="date" min="<?php echo date("Y-m-d") ?>"  id="dateT" name="dateT" placeholder="DD/MM/YYYY">
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
    $organisers = $_POST["organisers"];

    $sql = "INSERT INTO Tournaments (tName, tLoc, tDate) VALUES (?,?,?)";
    $stmt= $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $location, $date);
    $stmt->execute();
    echo '<meta http-equiv="refresh" content="0; URL=./tournamentsPage.php">';
    exit();
    
}
?>