<?php
try {
$username="root";
$pw="";
$db=new PDO("mysql:host=localhost;dbname=biblio;port=3306;charset=utf8;",$username,$pw);
} catch (PDOException $e) {
echo 'Erreur : ' . $e->getMessage();
} 
?>