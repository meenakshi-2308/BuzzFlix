<?php
    session_start();
    if(! isset($_SESSION['name'])){
        die('Not logged in');
    }

    if(isset($_SESSION['name'])){
        echo('<h1>&emsp;Tracking Top Rated shows for '.htmlentities($_SESSION['name'])."</h1>\n");
    }
?>

<!DOCTYPE html>
<html>
<head>
<?php require_once "bootstrap.php";
require_once "pdo.php"; ?>
<title>Meenakshi</title>
</head>
<body>
<div class="container">
<!--<h1>Please Log In</h1>-->
<?php
// Note triple not equals and think how badly double
// not equals would work here...
if (isset($_SESSION['failure']) && $_SESSION['failure'] !== false ) {
    // Look closely at the use of single and double quotes
    echo('<p style="color: red;">'.htmlentities($_SESSION['failure'])."</p>\n");
    unset($_SESSION['failure']);
}
if(isset($_SESSION['success'])){
    echo('<p style="color: green;">'.htmlentities($_SESSION['success'])."</p>\n");
    unset($_SESSION['success']);
}
if(isset($_SESSION['logfailure'])){
    echo('<p style="color: green;">'.htmlentities($_SESSION['logfailure'])."</p>\n");
    unset($_SESSION['logfailure']);
}
?>
<!--<form method="POST">
<label for="nam">Make: </label>
<input type="text" name="make" id="nam"><br/>
<label for="id_1723">Year: </label>
<input type="text" name="year" id="id_1723"><br/>
<label for="mile">Mileage: </label>
<input type="text" name="mileage" id="mile"><br/>
<input type="submit" name="add" value="Add">
<input type="submit" name="logout" value="Logout">
</form>-->
<?php
    /*echo("<h2>Automobiles</h2>");
    $stmt=$pdo->query("SELECT make,year,mileage from autos");
    echo("<ul>");
    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        echo("<li>");
        echo(htmlentities($row['year'])." ".htmlentities($row['make'])."/".htmlentities($row['mileage']));
        echo("</li>");
    }
    echo("</ul>");*/
?>
<!--<p><a href="add.php">Add New</a> | <a href="logout.php">Logout</a></p>-->

</div>
</body>