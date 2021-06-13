<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=people', 'meenakshi', 'ms2308');
$pdo1= new PDO('mysql:host=localhost;port=3306;dbname=imdb', 'meenakshi', 'ms2308');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);?>