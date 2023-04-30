<?php
include "MODEL/config.php";
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>regiter</title>
    <style>
        ::selection {
            background-color: #000;
            color: #fff;
        }

        body {
            height: 96vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: url(VIEW/images/p1.jpg);
            overflow: hidden;
            background-size: cover;
            background-attachment: fixed;
        }


        form {
            width: 350px;
            height: 500px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-evenly;
            background-color: rgb(0, 0, 0, 0.5);
            border-radius: 5px;
        }

        form input {
            width: 80%;
            height: 35px;
            text-indent: 20px;
        }

        form input[type="submit"] {
            width: 82%;
            height: 35px;
            text-indent: 0px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            background-color: black;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 17px;
            transition: .5s;
        }

        form input[type="submit"]:hover {
            transform: scale(1.05);
        }

        form input:focus {
            outline: none;
        }

        .header {
            width: 80%;
            height: 80px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .header h1 {
            margin: 0px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color: #fff;
        }

        .header span {
            margin-top: 20px;
            font-size: 18px;
            color: #fff;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }

        .links a {
            text-decoration: none;
            transition: 1s;
            color: #fff;
        }

        .links a:hover {
            text-decoration: underline;
        }

        .links a:last-child {
            font-size: 14px;
            color: gray;
        }

        .links span {
            color: #fff;
        }

        .msgBox {
            width: 82%;
            height: 45px;
            background-color: #ff1744;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            text-indent: 0;
            font-family: cursive;
            font-size: 13px;
            border-radius: 2px;
        }

        .hide {
            display: none;
        }

        .pwContainer {
            margin-right: 6px;
            width: 80%;
            position: relative;
        }

        .pwContainer input {
            width: 100%;
        }

        .afficher {
            display: none;
            cursor: pointer;
            width: 40px;
            height: 15px;
            font-size: 12px;
            position: absolute;
            bottom: 15px;
            right: 5px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
    </style>
</head>

<body>
    <form action="register.php" method="post">
        <div class="header">
            <h1>TP PHP CRUD</h1><span>S'nscrire</span>
        </div>
        <div class="msgBox hide"></div>
        <input type="text" placeholder="Nom d'utilisateur" name="username" required>
        <input type="text" placeholder="Email" name="email" id="emailIn" required>
        <input type="password" placeholder="Mot de passe" name="fPassword" id="pw1" required>
        <div class="pwContainer">
            <input type="password" placeholder="Confirmer le mot de passe" name="password" id="pw2" required>
            <span class="afficher masquer">Afficher</span>
        </div>
        <input type="submit" value="S'inscrire" name="send">
        <div class="links">
            <span>Déja inscrit ? </span>
            <a href="login.php">connectez-vous ici</a>
        </div>
    </form>
<?php
    if (isset($_POST["send"])) {
        $userName = $_POST["username"];
        $passWord = $_POST["password"];
        $Email = $_POST["email"];

        $req = $db->exec("INSERT INTO users(username, email, password) VALUES ('$userName','$Email','$passWord')");
        $_SESSION['name'] = $userName;
        header("location:index.php");
        ob_end_flush();
    }
?>
    <script src="VIEW/js/register.js"></script>
</body>

</html>