<?php
session_start();
ob_start();
include "view/nav.php";
include "view/header.php";

$realPath = "";
if (isset($_GET["path"])) {
    $includeMe = $_GET["path"];

    switch ($includeMe) {
        //============= Etudiants ========================================
        case "newStudent":
            $realPath = "CONTROLL/gestionement/gestionEtudiant/ajouterEtudiant.php";
            break;

        case "deleteStudent":
            $realPath = "CONTROLL/gestionement/gestionEtudiant/supremerEtudiant.php";
            break;

        case "editStudent":
            $realPath = "CONTROLL/gestionement/gestionEtudiant/modificationEtudiant.php";
            break;

        case "findStudent":
            $realPath = "CONTROLL/gestionement/gestionEtudiant/rechercheEtudiant.php";
            break;

        case "showStudent":
            $realPath = "CONTROLL/gestionement/gestionEtudiant/listeEtudiants.php";
            break;


        //============= Livre ========================================

        case "newBook":
            $realPath = "CONTROLL/gestionement/gestionLivre/ajouterLivre.php";
            break;
        case "deleteBook":
            $realPath = "CONTROLL/gestionement/gestionLivre/supremerLivre.php";
            break;
        case "editeBook":
            $realPath = "CONTROLL/gestionement/gestionLivre/modifierLivre.php";
            break;
        case "findBook":
            $realPath = "CONTROLL/gestionement/gestionLivre/chercherLivre.php";
            break;
        case "showbook":
            $realPath = "CONTROLL/gestionement/gestionLivre/listeLivre.php";
            break;

        //============= Emprunt ========================================

        case "newEnp":
            $realPath = "CONTROLL/gestionement/gestionEmprunts/emprunterLivre.php";
            break;
        case "returnE":
            $realPath = "CONTROLL/gestionement/gestionEmprunts/retourLivre.php";
            break;
        case "showBookE":
            $realPath = "CONTROLL/gestionement/gestionEmprunts/listeEmprunt.php";
            break;
    }
}





?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuil</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        ::selection {
            background-color: #be936a;
            color: #fff;
        }

        body {
            height: 96vh;
            overflow: hidden;
            background: url(VIEW/images/home2.jpg);
            background-attachment: fixed;
            background-size: cover;
        }


        section {
            margin-top: 100px;
            height: 100%;
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }


        .container {
            width: 800px;
            height: 200px;
            color: #fff;
            font-family: cursive;
        }

        .container span {
            font-size: 40px;
            position: relative;
            margin: 10px;
            padding: 5px;
        }
        .animateMe{
            animation: changeWH 2s linear  infinite;
        }
        @keyframes changeWH {
            0%{
                transform:rotate(45deg) translate(-50%, -50%) scale(0);
                opacity: 1;
            }
            100%{
                left: 100px;
                transform:rotate(45deg) translate(-50%, -50%) scale(8);
                opacity: 0;
            }
        }
    </style>
</head>

<body>
            <?php
                if (isset($_SESSION["name"])) {
                    if(isset($_GET["path"])){
                        include $realPath;
                    }else{
                        echo "<section>";
                        echo "<div class='container'><span>Bienvenue ";
                        echo $_SESSION["name"];
                        echo "</span></div>";
                        echo "</section>";

                    }
                } else {
                    header("location:login.php");
                    ob_end_flush();
                }
            ?>
</body>

</html>