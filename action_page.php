<?php

if (isset($_POST["sign-up-submit"])) {
    require 'db_credentials.php';

    $name = $_POST["name"];
    $username = $_POST["email"];
    $dob = $_POST["dob"];
    $password = $_POST["psw"];
    $password_rep = $_POST["psw-repeat"];
    $date = date("d-m-Y");
    
    $endings = array('\kcl.ac.uk'); 
    //preg_match('/('.implode('|', $endings).')$/i', $username);



    if (!filter_var($username, FILTER_VALIDATE_EMAIL )) {
        header("Location: ../public/access.php?error=invalidmail");
        exit();
    } else if (!strpos($username, 'kcl.ac.uk')) {
        header("Location: ../public/access.php?error=kclemail");
        exit();
    }
    else if ($password != $password_rep) {
        header("Location: ../public/access.php?error=emptyfields&email=".$username);
        exit();
    }
    else {
        $sql = "SELECT email FROM Member WHERE email='$username'";
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
                $sql = "INSERT INTO member (name, email, dob, membPsw, date_joined) VALUES (?,?,?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../public/access.php?error=sqlerror1");
                    exit();
                } else {
                    $hashPsw = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "sssss", $name, $username, $dob, $hashPsw, $date);
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