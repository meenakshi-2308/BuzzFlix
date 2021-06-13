<?php // Do not put any HTML above this line
session_start();
require_once "bootstrap.php";
require_once "pdo.php";
if ( isset($_POST['signup'] ) ) {
    // Redirect the browser to game.php
    $_SESSION['signup']='signup';
    header("Location: register.php");
    return;
}

$salt = 'XyZzy12*_';
//$stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1';  // Pw is meow123

//$_SESSION['failure'] = false;  // If we have no POST data

// Check to see if we have some POST data, if we do process it
if (isset($_POST['login']) && isset($_POST['who']) && isset($_POST['pass']) ) {
    if ( strlen($_POST['who']) < 1 || strlen($_POST['pass']) < 1 ) {
        //error_log("Login fail ".$_POST['who']);
        $_SESSION['failure'] = "Email and password are required";
        header("Location: login.php");
        return;
    }
    else if(strpos($_POST['who'],'@')===false){
        //error_log("Login fail ".$_POST['who']);
        $_SESSION['failure']="Email must have an at-sign (@)";
        header("Location: login.php");
        return;
    }
    else {
        $sql='SELECT pwd FROM registered WHERE email=:email';
        $stmt=$pdo->prepare($sql);
        $stmt->execute(array(
            ':email'=>$_POST['who']
        ));
        $stored_hash=$stmt->fetch()[pwd];
        
        //$check = hash('md5', $salt.$_POST['pass']);
        if ( $_POST['pass'] == $stored_hash) {
            // Redirect the browser to game.php
            error_log("Login success ".$_POST['who']);
            $_SESSION['name']=$_POST['who'];
            header("Location: home.php");
            return;
        } else {
            error_log("Login fail ".$_POST['who']." $check");
            $_SESSION['failure'] = "Incorrect password";
            header("Location: login.php");
            return;
        }
    }
}

// Fall through into the View
?>
<!DOCTYPE html>
<html>
<head>
<?php require_once "bootstrap.php";
require_once "pdo.php"; ?>
<title>Log In</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div>
<div class="container login">
<h1>Login</h1>
<?php
// Note triple not equals and think how badly double
// not equals would work here...
if (isset($_SESSION['failure'])) {
    // Look closely at the use of single and double quotes
    echo('<p style="color: red;">'.htmlentities($_SESSION['failure'])."</p>\n");
    unset($_SESSION['failure']);
}
?>
<form method="POST">
<p><label for="nam"  class="login_ele">&emsp;&nbsp;&nbsp;&nbsp;Email</label>
<input type="text" name="who" id="nam"><br/></p>
<p><label for="id_1723"  class="login_ele">Password</label>
<input type="password" name="pass" id="id_1723"><br/></p>
<p><input type="submit" name="login" value="Log In"  class="login_ele">&emsp;
<input type="submit" name="signup" value="Sign Up"  class="login_ele"></p>
</form>

</div>
</div>
</body>
