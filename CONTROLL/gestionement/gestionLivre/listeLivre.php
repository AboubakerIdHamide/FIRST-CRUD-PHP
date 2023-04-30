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
        ::selection{
            background-color: #be936a;
            color: #fff;
        }
        *{
            margin: 0;
            padding: 0;
        }
        body{
            height: fit-content;
            background-size: cover;
            background-attachment: fixed;
            padding-bottom:100px;
        }
        section{
            margin-top: 100px;
            width: 100%;
            min-height: 500px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        table{
            margin-left: 60px;
            border-radius: 2px;
            width: 800px;
            min-height: 150px;
            background-color: rgb(0, 0, 0, 0.5);
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
        thead td{
            background-color: #3cf38780;
            color: #fff;
            text-align: center;
            min-height: 45px;
            font-family: cursive;
            font-size: 16px;
            border: 1px solid #fff;
            padding: 10px;
        }
        tbody td{
            text-align: center;
            min-height:35px;
            padding: 5px;
            background-color:rgb(0, 0, 0, 0.5);
            font-size: 14px;
            color: #fff;
            border: 1px solid #fff;
            font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }
        tbody tr{
            transition:all 1s;
        }
        tbody tr:hover{
            background-color: #bfa47b !important;
        }
    </style>
</head>
<body>
    <section>
        <table>
            <thead>
                <tr>
                    <td>Code</td>
                    <td>Titre</td>
                    <td>Auteur</td>
                    <td>Date de edtion</td>
                </tr>
            </thead>
            <tbody>
        <?php
            $res=$Livre->afficherLivres();
            if(count($res)!=0){
                foreach($res as $i){
                    echo "<tr>";
                    echo "<td>".$i["CodeLivre"]."</td>";
                    echo "<td>".$i["Titre"]."</td>";
                    echo "<td>".$i["Auteur"]."</td>";
                    echo "<td>".$i["DateEdtion"]."</td>";
                    echo "</tr>";
                }
            }else{
                echo "<tr>";
                    echo "<td colspan='5'>Pas de resultat</td>";
                    echo "</tr>";
            }
        ?>
            </tbody>
        </table>
    </section>
</body>
</html>