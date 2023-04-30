<?php
include "MODEL/enprunter.php";
include "MODEL/config.php";
$Emprunter=new Emprunt($db);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Etudiant</title>
    <style>
        body{
            height: 96vh;
            background-size: cover;
            overflow: hidden;
        }
        section{
            margin-top: 100px;
            width: 100%;
            height: calc(96vh - 100px);
            display: flex;
            justify-content: center;
            align-items: center;
        }
        table{
            margin-left: 60px;
            border-radius: 2px;
            padding:20px;
            width: 800px;
            height: 320px;
            background-color:  rgb(0,0,0,0.5);
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
        select{
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
            background-color: #fff;
            color: #000;
            border-radius: 3px;
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 17px;
            transition: all 1s;
        }
        input[type="submit"]:hover{
            transform: scale(1.2);
            background-color: #000;
            color: #fff;
        }
        td{
            min-width: 130px;
            color: #fff;
            text-align: center;
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
        .msgBox{
            height: 40px;
            background-color: #be936a;
            color: #fff;
            border-radius: 2px;
        }
        .invalid{
            background-color: #ff174480;
            color: #fff;
        }
        .valid{
            background-color: #3cf38780;
            color: #fff;
        }

    </style>
</head>
<body>
    <section>
        <table>
            <form action="index.php?path=returnE" method="post">
                <tr>
                    <td colspan="2"  class="msgBox">Choisissez le livre et l'élève vers lesquels vous reviendrez</td>
                </tr>
                <tr>
                    <td>Etudiant : </td>
                    <td><select name="codeEtudiant"  required>
                        <?php
                         $eOptions=$Emprunter->afficherEmprunts();
                         foreach($eOptions as $i){
                             echo "<option value='".$i["CodeEtudient"]."'>".$i["Nom"]." ".$i["Prenom"]." </option>";
                         }
                        ?>
                    </select></td>
                </tr>
                <tr>
                    <td>Livre : </td>
                    <td><select name="codeLivre" required>
                        <?php
                         $lOptions=$Emprunter->afficherEmprunts();
                         foreach($lOptions as $i){
                             echo "<option value='".$i["CodeLivre"]."'>".$i["Titre"]." </option>";
                         }
                        ?>
                    </select></td>
                </tr>
                <tr>
                    <td><input type="submit" name="send" value="Retourner"></td>
                </tr>
            </form>
        </table>
    </section>
    <?php
    $message="";
    $eror="_";
    if(isset($_POST["send"])){
        $codeE=filter_var($_POST["codeEtudiant"], FILTER_VALIDATE_INT);
        $codeL=filter_var($_POST["codeLivre"], FILTER_VALIDATE_INT);

        if($codeE && $codeL){
            $res= $Emprunter->suprimerEmprunt($codeL, $codeE);
            if($res==true){
                $eror=false;
                $message="Le livre a était retourner .";
            }else{
                $eror=true;
                $message="L `une de ces informations est incorrecte réessayez.";
            }
        }else{
            $eror=true;
            $message= "L`etudiant déja retourner ce livre !";
        }
    }
    ?>
    <script>
    let msg='<?=$message?>',
    err='<?=$eror?>';
    if(msg!="" || err!="_"){
        let msgBox=document.querySelector(".msgBox");
        if(err==1){
            if(msgBox.classList.contains("valid")){
                msgBox.classList.remove("valid");
            }
            msgBox.classList.add("invalid");
        }else{
            if(msgBox.classList.contains("invalid")){
                msgBox.classList.remove("invalid");
            }
            msgBox.classList.add("valid");
        }
        msgBox.textContent=msg;
    }

    let inputs=document.querySelectorAll("input");
    inputs.forEach((input, index)=>{
        input.addEventListener('keydown', (e)=>{
            if(e.key=='Enter'){
                if(index!=(inputs.length - 1)){
                    e.preventDefault();
                }
                inputs[index+1].focus();
            }
        })
    })
    </script>
</body>
</html>