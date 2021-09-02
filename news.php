<?php 
session_start();
?>
<html>

    <head>
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif|Open+Sans&display=swap" rel="stylesheet">
    </head>
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
            float: center;
        }

        .news_block {
            width: 60%;
            margin-top: 30px;
            text-align:left;
            color: black;
        }
      
        .article {
            margin: 20px auto 20px auto;
            width: 50%;
            border: 3px solid red;
            padding: 10px 20px 20px 30px;
        }
      
        h6 {
            padding-top: -10px;
            float: right;
            color: grey;
        }
        

    </style>
    <header><?php include_once("../inc/header.php");?></header>
    <body>
    <div class="upper">
            <h1 style="text-align: center">News</h1>
            <div id="officer" class="<?php
                echo $_SESSION["officer"] == 1 ? 'show' : 'hidden';
            ?>">
                <a href="./addNews.php" class="add">Add News</a> 
            </div>
        </div>
        <div class="news-block">
        <?php
            require '../resources/db_credentials.php';
            $query = "SELECT * FROM article;";
            $set = mysqli_query($conn, $query);
            while ($art = mysqli_fetch_assoc($set))
            { 
            
            echo '<div class="article">';
            echo '<h3>'.$art["title"].'</h3><hr>';
            echo '<p>'.$art["content"].'</p>';
            echo '<h6>'.$art["date_posted"].'</h6>';
            echo "</div>";
            }
        ?>
        </div>
    </body>
</html>

