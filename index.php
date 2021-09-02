<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="./stylesheets/landingPage.css">
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif&display=swap" rel="stylesheet">
    <style>

        h1 {
            margin: 0;
            font-size: 50px;
        }

        h2 {
            margin: 0;
            margin-top:12%;
        }

        body{
            display: flex;
            flex: 1;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            font-family:"Bree Serif";
            color: white;
            text-align: center;
            background: linear-gradient(88deg, #ef2f2f, #ff5e5e);
            background-size: 400% 400%;

            -webkit-animation: AnimationName 9s ease infinite;
            -moz-animation: AnimationName 9s ease infinite;
            animation: AnimationName 9s ease infinite;

            @-webkit-keyframes AnimationName {
                0%{background-position:0% 50%}
                50%{background-position:100% 50%}
                100%{background-position:0% 50%}
            }
            @-moz-keyframes AnimationName {
                0%{background-position:0% 50%}
                50%{background-position:100% 50%}
                100%{background-position:0% 50%}
            }
            @keyframes AnimationName {
                0%{background-position:0% 50%}
                50%{background-position:100% 50%}
                100%{background-position:0% 50%}
            }
        }

        a {
            background: white; 
            padding:10px;
            border-radius:10px;
            text-decoration:none;
            color: #ef2f2f; 
            margin-top: 20px;
        }

        p {
            width: 50%;
        }

        .container {
            
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        
        }
    </style>
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Welcome to the</h2>
        <h1>KCL Chess Society </h1>

        <p>
            Whether you’re the next Magnus Carlsen or a complete beginner just hoping to learn the rules of chess,
            the chess society has something for you. In our relaxed weekly sessions beginners will be able to learn the rules
            and basic strategies of the game, while more experienced players can test their skills against worthy opposition.
        </p>
    
        <a href="./public/access.php" class="logOn">Log In</a>
    </div>
</body>
</html>
