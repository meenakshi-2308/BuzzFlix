<?php
    session_start();
    require_once "pdo.php";
    require_once "bootstrap.php";
    if(isset($_SESSION['search'])){
        $sql='SELECT * FROM chart WHERE title=:title';
        $stmt=$pdo1->prepare($sql);
        $stmt->execute(array(
            ':title'=>$_SESSION['search']
        ));
        $row=$stmt->fetch();
        if($row===false){
            $_SESSION['failure']='Record not found!';
            echo('<p style="color: white; font-size:5em; text-align:center";>'.htmlentities($_SESSION['failure']).'</p>');
            unset($_SESSION['failure']);
            
        }
        else{
            //$_SESSION['success']='Record Found!';
            $_SESSION['link']=$row[link];
            header("Location: ".htmlentities($_SESSION['link']));
            return;
        }
    }
    else{
        header("Location: home.php");
        return;
    }
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="submission_style.css">
<title>Rest while we Search</title>
</head>

<body class="error" style="background-image: url('error.png'); background-repeat: no-repeat; background-size:cover;">
</body>
</html>

