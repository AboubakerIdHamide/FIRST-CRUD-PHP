<?php
include "MODEL/etudient.php";
include "MODEL/config.php";
$Etudiant=new Etudiant($db);
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
            background-color: #3cf38780;
            color: #fff;
            border-radius: 3px;
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 17px;
            transition: all 1s;
        }
        input[type="submit"]:hover{
            transform: scale(1.2);
            background-color: #fff;
            color: #3cf38780;
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

        .editTable{
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
    </style>
</head>
<body>
    <section>
    <?php
    // ============================= global variables ===================
        $message="";
        $eror="_";
        $formDerecherche="
        <table class='searchTable'>
        <form action='index.php?path=editStudent' method='post'>
            <tr>
                <td colspan='2'  class='msgBox hide'></td>
            </tr>
            <tr>
                <td>Code d'etudiant:</td>
                <td><input type='text' name='valeur' placeholder='Saisir Le code detudiant...' required></td>
            </tr>
            <tr>
                <td><input type='submit' name='send' value='Modifier'></td>
            </tr>

        </form>
        </table>";

        // ================================================================
        if(isset($_POST["send"])){
            $valeur=$_POST["valeur"];
            $res=$Etudiant->trouverUniqueEtudiants($valeur);
            if(count($res)!=0){
                $eror=false;
                $message="Vous pouvez modifier ces informations .";
                foreach($res as $i){
                    $code=$i["CodeEtudient"];
                    $nom=$i["Nom"];
                    $Prenom=$i["Prenom"];
                    $Adresse=$i["Adresse"];
                    $Classe=$i["Classe"];
                    echo "
                    <table class='editTable'>
                        <form action='index.php?path=editStudent&oldCode=$code' method='post'>
                    <tr>
                        <td colspan='2'  class='msgBox hide'></td>
                    </tr>
                    <tr>
                    <td>Code d'etudiant</td>
                    <td><input type='text' name='code' value='$code' required></td>
                    </tr>
                    <tr>
                    <td>Nom</td>
                    <td><input type='text' name='nom' value='$nom' required></td>
                    </tr>
                    <tr>
                    <td>Prénom</td>
                    <td><input type='text' name='prenom' value='$Prenom' required></td>
                    </tr>
                    <tr>
                    <td>Classe</td>
                    <td><input type='text' name='classe' value='$Classe' required></td>
                    </tr>
                    <tr>
                    <td>Adresse</td>
                    <td rowspan='2'><textarea name='adresse' required>$Adresse</textarea></td>
                    </tr>
                    <tr>
                    <td><input type='submit' name='confirm' value='Confirmer'></td>
                    </tr>
                    </form>
                    </table>";
                } 
            }else{
                $eror=true;
                $message="Le code est incorrecte.";
                echo $formDerecherche;
            }
            unset($_POST["send"]);
        }else{
            if(isset($_POST["confirm"])){
                $oldCode=$_GET["oldCode"];
                $code=$_POST["code"];
                $nom=$_POST["nom"];
                $prenom=$_POST["prenom"];
                $classe=$_POST["classe"];
                $adresse=$_POST["adresse"];

                $res=$Etudiant->modifierEtudiant($oldCode, $code, $nom, $prenom, $adresse, $classe);
                $eror=false;
                $message="Les Informations sont Modifier.";
                if($res!=true){
                    $eror=true;
                    $message="Invalide Informations .";
                }
                unset($_POST["confirm"]);
            }
            echo $formDerecherche;
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