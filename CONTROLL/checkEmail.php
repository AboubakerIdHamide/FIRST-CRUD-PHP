<?php
include "../MODEL/config.php";
if(isset($_POST['email'])){
    $Email = $_POST["email"];

    $req = $db->query("SELECT email FROM users WHERE email='$Email'");
    $res = $req->fetchAll();
    if(count($res) != 0) {
        echo "alreadyUsed";
    }else{
        echo "pass";
    }
}
?>