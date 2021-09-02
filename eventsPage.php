<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>

<style>

header {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-start;
}

.show {
  display: block;
  margin-bottom: 30px;
}

.hidden {
  display: none;
}

.upper{
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}

.add {
  background: #EF2F2F;
  color: white;
  font-size: 16px;
  padding: 5px;
  border-radius: 10px;
  text-decoration: none;
  margin-bottom: 20px;
}

table {

  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 60%;
}

td, th {
  border: 2px solid #000;
  text-align: left;
  padding: 8px;
}

tr:nth-child(1) {
  background-color: #EF2F2F;
  font-size: 18px;
  color: white;
}

a {
  color: black; 
}

</style>
</head>
<header><?php include_once("../inc/header.php");?></header>
<body>

<div class="upper">
<h1>Events</h1>
<div id="officer" class="<?php
echo $_SESSION["officer"] == 1 ? 'show' : 'hidden';
?>">
<a href="./addEvent.php" class="add">Add Event</a> 
</div>
 <table>
    <tr>
      <th>Event</th>
      <th>Location</th>
      <th>Date</th>
    </tr>
    <?php
    require '../resources/db_credentials.php';
    $query = "SELECT * FROM `Events`";
    $set = mysqli_query($conn, $query);
    if(!$set) {
    } else {
    while ($tour = mysqli_fetch_assoc($set))
    { 
        //if($tour["expiry"])
      echo '<tr >';
      echo '<td> <a href="./event.php?name='.$tour["title"].'&loc='.$tour["location"].'&date='.$tour["expiry"].'">'.$tour["title"].'</a></td>';
      echo '<td>'.$tour["location"].'</td>';
      echo "<td>".$tour["expiry"] . "</td>";
      echo "<tr>";
  }
}
?>
  </table>
</div>
</body>
</html>