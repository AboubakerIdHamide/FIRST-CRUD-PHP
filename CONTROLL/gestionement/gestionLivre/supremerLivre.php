<?php
include "MODEL/livre.php";
include "MODEL/config.php";
$Livre=new Livre($db);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body{
            background-size: cover;
            background-attachment: fixed;
            overflow-y: auto;
            overflow-x: hidden;
        }
        body::-webkit-scrollbar{
            width: 5px;
            background-color: #bfa47b;
        }
        body::-webkit-scrollbar-thumb{
            background-color: #fff;
        }
        section{
            margin-top: 100px;
            width: 100%;
            min-height: calc(96vh - 100px);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .searchTable{
            border-radius: 2px;
            margin-left: 60px;
            padding:20px;
            width: 800px;
            height: 200px;
            background-color:  rgb(0,0,0,0.5);
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
        input{
            border-radius: 2px;
            width: 300px;
            height: 40px;
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            outline: none;
            border: none;
            text-indent: 20px;
        }
        input[type="submit"]{
            width: 100px;
            height: 40px;
            outline: none;
            border: none;
            text-indent: 0px;
            background-color: #ff174480;
            color: #fff;
            border-radius: 3px;
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 17px;
            transition: all 1s;
        }
        input[type="submit"]:hover{
            transform: scale(1.2);
            background-color: #fff;
            color: #ff174480;
        }
        td{
            min-width: 130px;
            color: #fff;
            text-align: center;
        }

        .msgBox{
            height: 40px;
        }
        .invalid{
            background-color: #ff174480;
            color: #fff;
        }
        .valid{
            background-color: #3cf38780;
            color: #fff;
        }

        .hide{
            display: none;
        }

        .deleteTable{
            margin-left: 60px;
            border-radius: 2px;
            padding:20px;
            width: 800px;
            height: 460px;
            background-color:  rgb(0,0,0,0.5);
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
        textarea{
            padding: 10px 0px;
            width: 300px;
            height: 100px;
            text-indent: 20px;
            border: none;
            outline: none;
            resize: none;
            border-radius: 2px;
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        #cancel{
            background-color: #3cf38780;
            color: #fff;
        }
        #cancel:hover{
            background-color: #fff;
            color: #3cf38780;
        }
    </style>
</head>
<body>
    <section>
    <?php
    //  ================ Global Vriables =======================
        $message="";
        $eror="_";
        $formDeRecherche="<table class='searchTable'>
        <form action='index.php?path=deleteBook' method='post'>
            <tr>
                <td colspan='2'  class='msgBox hide'></td>
            </tr>
            <tr>
                <td>Code :</td>
                <td><input type='text' name='valeur' placeholder='Saisir Le code de livre a suprimer...' required></td>
            </tr>
            <tr>
                <td><input type='submit' name='send' value='Suprimer'></td>
            </tr>

        </form>
        </table>";
        // =========================================================================


        if(isset($_POST["send"])){
            $valeur=$_POST["valeur"];
            $res=$Livre->trouverUniqueLivre($valeur);
            if(count($res)!=0){
                $eror=true;
                $message="Vous pouvez suprimer ces informations .";
                foreach($res as $i){
                    $code=$i["CodeLivre"];
                    $Titre=$i["Titre"];
                    $Auteur=$i["Auteur"];
                    $DateEdtion=$i["DateEdtion"];
                    echo "
                    <table class='deleteTable'>
                        <form action='index.php?path=deleteBook&codeTodelete=$code' method='post'>
                    <tr>
                    <tr>
                        <td colspan='2'  class='msgBox hide'></td>
                    </tr>
                    <td>Code de livre</td>
                    <td>$code</td>
                    </tr>
                    <tr>
                    <td>Titre</td>
                    <td>$Titre</td>
                    </tr>
                    <tr>
                    <td>Auteur</td>
                    <td>$Auteur</td>
                    </tr>
                    <tr>
                    <td>Date d'edution</td>
                    <td>$DateEdtion</td>
                    </tr>
                    <tr>
                    <td><input type='submit' name='confirm' value='Confirmer'></td>
                    <td><input type='submit' name='cancel' value='Annuler' id='cancel'></td>
                    </tr>
                    </form>
                    </table>";
                } 
            }else{
                $eror=true;
                $message="Le code est incorrecte.";
                echo $formDeRecherche;
            }
            unset($_POST["send"]);
        }else{
            if(isset($_POST["confirm"])){
                $codeTodelete=$_GET["codeTodelete"];
                $res=$Livre->suprimerLivre($codeTodelete);
                $eror=false;
                $message="Le Livre  a était suprimer.";
                unset($_POST["confirm"]);
            }else if(isset($_POST["cancel"])){
                $eror=true;
                $message="Les information ne sont pas suprimer.";
                unset($_POST["cancel"]);
            }
            echo $formDeRecherche;
        }
        ?>
    </section>
    <script>
    let msg='<?=$message?>',
    err='<?=$eror?>';


    if(msg!="" && err!="_"){
        let msgBox=document.querySelector(".msgBox");
        if(err==1){
            if(msgBox.classList.contains("valid")){
                msgBox.classList.remove("valid");
            }
            msgBox.classList.remove("hide");
            msgBox.classList.add("invalid");
        }else{
            if(msgBox.classList.contains("invalid")){
                msgBox.classList.remove("invalid");
            }
            msgBox.classList.remove("hide");
            msgBox.classList.add("valid");
        }
        msgBox.textContent=msg;
    }
    </script>
</body>
</html>