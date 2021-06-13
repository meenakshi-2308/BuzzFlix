<?php // Do not put any HTML above this line
session_start();
require_once "bootstrap.php";
require_once "pdo.php";

        $sql='SELECT * FROM chart LIMIT 10';
        $stmt=$pdo1->prepare($sql);
        $stmt->execute();
        $link=$stmt->fetchall();
        echo('<table style="margin-left:auto; margin-right:auto; margin-top:200px; margin-bottom:auto">');
            echo('<tr>');
                echo('<th>ID</th>');
                echo('<th>&emsp;Title</th>');
                echo('<th>&emsp;Rating&nbsp;&nbsp;</th>');
                echo('<th>&emsp;Link</th>');
            echo('</tr>');
            for($i=0;$i<10;$i=$i+1){
                echo('<tr>');
                    echo('<td>'.htmlentities($link[$i][0]).'</td>');
                    echo('<td>&emsp;'.htmlentities($link[$i][1]).'</td>');
                    echo('<td>&emsp;'.htmlentities($link[$i][2]).'</td>');
                    echo('<td><a href="'.htmlentities($link[$i][3]).'">&emsp;Go to IMDb Site</a></td>');
                echo('</tr>');
            }
        echo('</table>');

        
?>
<!DOCTYPE html>
<html>
<head>
<?php require_once "bootstrap.php";
require_once "pdo.php"; ?>
<title>Top 10!</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
</body>
</html>
