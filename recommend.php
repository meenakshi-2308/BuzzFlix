<?php // Do not put any HTML above this line
session_start();
require_once "bootstrap.php";
require_once "pdo.php";

        $sql='SELECT * FROM chart ORDER BY RAND() LIMIT 1';
        $stmt=$pdo1->prepare($sql);
        $stmt->execute();
        $link=$stmt->fetch()[link];
        header("Location:".$link);
        return;
?>
<!DOCTYPE html>
<html>
<head>
<?php require_once "bootstrap.php";
require_once "pdo.php"; ?>
<title>We Recommend!</title>
<link rel="stylesheet" href="style.css">
</head>
</html>
