<?php // Do not put any HTML above this line
session_start();
require_once "bootstrap.php";
require_once "pdo.php";
if ( isset($_POST['cancel'] ) ) {
    // Redirect the browser to game.php
    $_SESSION['cancel']='cancel';
    header("Location: login.php");
    return;
}
$salt = 'XyZzy12*_';
//$stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1';  // Pw is meow123

//$_SESSION['failure'] = false;  // If we have no POST data

// Check to see if we have some POST data, if we do process it
if (isset($_POST['register']) && isset($_POST['who']) && isset($_POST['pass']) ) {
    if ( strlen($_POST['who']) < 1 || strlen($_POST['pass']) < 1 ) {
        //error_log("Login fail ".$_POST['who']);
        $_SESSION['failure'] = "Email and password are required";
        header("Location: register.php");
        return;
    }
    else if(strpos($_POST['who'],'@')===false){
        //error_log("Login fail ".$_POST['who']);
        $_SESSION['failure']="Email must have an at-sign (@)";
        header("Location: register.php");
        return;
    }
    else if(strlen($_POST['pass'])<8){
        $_SESSION['failure']="Password must be at least 8 characters long";
        header("Location: register.php");
        return;
    }
    else {
        
        $sql='INSERT INTO registered (name,email,pwd) VALUES (:name,:email,:pwd)';
        $stmt=$pdo->prepare($sql);
        $stmt->execute(array(
            ':name'=>$_POST['name'],
            ':email'=>$_POST['who'],
            ':pwd'=>$_POST['pass']
        ));
        //$stored_hash=$stmt->fetch();
        //$check = hash('md5', $salt.$_POST['pass']);
        $_SESSION['success']='Record inserted';
    header("Location:login.php");
    return;
    }
}

// Fall through into the View
?>
<!DOCTYPE html>
<html>
<head>
<?php require_once "bootstrap.php";
require_once "pdo.php"; ?>
<title>Register</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div>
<div class="container login">
<h1>Sign Up!</h1>
<p>BLah gftdtfgfv hftgfgjv hugcjgv hjfuvjh jhugchj <br/>tdtu fuivuhugi gftfgh hftfloi grdiy <br/>tf7trfu tfouytg 6ei yty uyfcgdk hlgky</p>
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
<p><label for="name"  class="login_ele">&emsp;&nbsp;&nbsp;&nbsp;&nbsp;Name</label>
<input type="text" name="name" id="name"><br/></p>
<p><label for="nam"  class="login_ele">&emsp;&nbsp;&nbsp;&nbsp;Email</label>
<input type="text" name="who" id="nam"><br/></p>
<p><label for="id_1723"  class="login_ele">Password</label>
<input type="password" name="pass" id="id_1723"><br/></p>
<p><input type="submit" name="register" value="Register"  class="login_ele">&emsp;
<input type="submit" name="cancel" value="Cancel"  class="login_ele"></p>
</form>

</div>
</div>
</body>
