<!DOCTYPE html>
<html>
<head>
<style>

.upper{
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}

table {

  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 60%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

table tr th:nth-child(1){
       width: 60%;
     }

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>
<?php include_once("../inc/header.php");?>
<?php
    require_once("./resources/initialise.php");
    $query = get_Members();
?>
<div class="upper">
           
        
<h2>All Members</h2>

  <table>
  <thead>
    <tr>
      <th id="name">Name</th>
      <th>ELO Rating</th>
    </tr>
    </thead>
    <?php
               while ($row = mysqli_fetch_assoc($query)) {
                   echo "<tr>";
                   echo "<td>".$row["name"]."</td>";
                   echo "<td>".$row["elo_rating"]."</td>";
                   echo "</tr>";
               }

            ?>
  </table>
</div>
</body>
</html>
