
<html>
    <head>
        <link rel="stylesheet" href="./stylesheets/splash.css">
    </head>
    <body>
    <div class="row" id="row">
        <form action="../resources/action_page.php" method="post">
            <div class="column" id="signUp">
                <h1>Sign Up</h1>
                <p>Please fill in this form to create an account.</p>
                <p class="error"><?php 
                        if(isset($_GET["error"])){
                            if ($_GET["error"] == "emailregistered") {
                            echo "Email already in use";
                        }
                            else if ($_GET["error"] == "kclemail"){
                                echo "Only KCL emails are allowed.";
                            }
                        } else if (isset($_GET["signup"])){
                            echo "Joined successfully. You may now log-in.";
                        }
                    ?>
                </p>
                <hr>
                   
                    <label for="name"><b>Name</b></label>
                    <input type="text" placeholder="Kimi no na wa" name="name" required>

                    <label for="email"><b>Email</b></label>
                    <input type="text" placeholder="Enter Email" name="email" required>

                    <label for="dob"><b>Date of Birth</b></label>
                    <input type="date"  name="dob" required>

                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="psw" required>

                    <label for="psw-repeat"><b>Repeat Password</b></label>
                    <input type="password" placeholder="Repeat Password" name="psw-repeat" required>

                    <label>
                        <input type="checkbox" name="remember" style="margin-bottom:15px"> Remember me
                    </label>
                    <div class="clearfix">
                        <button type="submit" name="sign-up-submit" class="signupbtn" >Sign Up</button>
                    </div>
                    <?php 
                        if(isset($_GET["error"]) && $_GET["error"] == "emailregistered"){
                            echo "Email already in use";
                        } else if (isset($_GET["signup"])){
                            echo "Joined successfully. You may now log-in.";
                        }
                    ?>
            </div>
        </form>
        
        <form action="../resources/login_action.php" method="post">
            <div class="column" id="logIn">
                <h1>Log In</h1>
                <p>If you have an account already, please log in.</p>
                <p class="error"><?php 
                        if(isset($_GET["error"])){
                            if ($_GET["error"] == "wrongpsw") {
                            echo "Wrong password";
                        }
                            else if ($_GET["error"] == "nouser"){
                                echo "No user registered with this email.";
                            }
                        }
                    ?></p>
                <hr>
                
                    <label for="email"><b>Email</b></label>
                    <input type="text" placeholder="Enter Email" name="email" required>

                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="psw-log" required>

                    <div class="clearfix">
                        <button type="submit" name="log-in-submit" class="signupbtn">Log In</button>
                    </div>
            </div>
        </form>
        </div>
    </body>
</html>
