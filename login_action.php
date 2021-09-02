<?php

if (isset($_POST["sign-up-submit"])) {
    require 'db_credentials.php';

    $username = $_POST["email"];
    $password = $_POST["psw"];
    $password_rep = $_POST["psw-repeat"];

    if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../public/access.php?error=invalidmail");
        exit();
    }
    else if ($password != $password_rep) {
        header("Location: ../public/access.php?error=emptyfields&email=".$username);
        exit();
    }
    else {
        $sql = "SELECT email FROM Member WHERE email=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../public/access.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s");
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            if (mysqli_stmt_num_rows($stmt) > 0) {
                header("Location: ../public/access.php?error=emailregistered");
                exit(); 
            }
            else {
                $sql = "INSERT INTO Member (email, password) VALUES (?,?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../public/access.php?error=sqlerror1");
                    exit();
                } else {
                    $hashPsw = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "ss", $username, $hashPsw);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../public/access.php?signup=success");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    myssqli_close($conn);
    /* else if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../public/access.php?error=emptyfields&email=".$username);
    }
    else if (!preg_match("/^[a-zA-Z0-9]*$/",$username)) {
        header("Location: ../public/access.php?error=emptyfields");
        exit();
    } */
}

if (isset($_POST["log-in-submit"])) {
    require 'db_credentials.php';~

    $username = $_POST["email"];
    $password = $_POST["psw-log"];

    if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../public/access.php?error=invalidmail");
        exit();
    } else {

    $sql = "SELECT * FROM Member WHERE email=?";
    $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../public/access.php?error=sqlerror");
            exit();
        } else{
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $pswCheck = password_verify($password, $row["membPsw"]);
                if ($pswCheck == false){
                    header("Location: ../public/access.php?error=wrongpsw");
                    exit();
                } else if ($pswCheck == true){
                    session_start();
                    $_SESSION["email"] = $row["email"];
                    $_SESSION["name"] = $row["name"];
                    $_SESSION["date"] = $row["date_joined"];
                    $_SESSION["dob"] = $row["dob"];
                    $_SESSION["phone"] = $row["phone"];
                    $_SESSION["maddress"] = $row["maddress"];
                    $_SESSION["elo"] = $row["elo_rating"];
                    $_SESSION["officer"] = $row["officer"];
                    header("Location: ../public/profile.php");
                    exit();
                } else {
                    header("Location: ../public/access.php?error=wrongpsw");
                    exit();
                }
            } else {
                header("Location: ../public/access.php?error=nouser");
                exit();
            }
        }
    }
}
/* function Login() {
    
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    
    if(!$this->CheckLoginInDB($username,$password))
    {
        return false;
    }
    
    session_start();
    
    $_SESSION[$this->GetLoginSessionVar()] = $username;
    
    return true;
}

function CheckLoginInDB($username,$password)
{
    if(!$this->DBLogin())
    {
        $this->HandleError("Database login failed!");
        return false;
    }          
    $username = $this->SanitizeForSQL($username);
    $pwdmd5 = md5($password);
    $qry = "Select name, email from $this->tablename ".
        " where username='$username' and password='$pwdmd5' ".
        " and confirmcode='y'";
    
    $result = mysql_query($qry,$this->connection);
    
    if(!$result || mysql_num_rows($result) <= 0)
    {
        $this->HandleError("Error logging in. ".
            "The username or password does not match");
        return false;
    }
    return true;
}
 */
?>